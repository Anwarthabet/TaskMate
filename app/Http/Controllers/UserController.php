<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;


class UserController extends Controller
{
  

  public function index()
{
    $users = User::orderBy('id', 'desc')->paginate(10);
    return view('users.index', compact('users'));
}

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username'        => ['required','string','min:3','max:50','alpha_dash','unique:users,username'],
            'email'           => ['required','email','max:255','unique:users,email'],
            'password'        => ['required','confirmed','min:8'],
            'profile_picture' => ['nullable','image','max:1024'],
            'account_status'  => ['required', Rule::in(['active','inactive'])],
            'role'            => ['required', Rule::in(['admin','user'])],
        ]);

        if ($request->hasFile('profile_picture')) {
            $validated['profile_picture'] = $request->file('profile_picture')->store('profile_pictures','public');
        }

        $validated['password'] = Hash::make($validated['password']);
        $validated['sign_up_date'] = now();
      //  $validated['last_login'] = null;

        User::create($validated);

        return redirect()->route('users.index')->with('success','تم إنشاء المستخدم بنجاح.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        // فقط المسؤول أو صاحب الحساب يمكنه التعديل
        if (! auth()->user()->isAdmin() && auth()->id() !== $user->id) {
            abort(403);
        }
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if (! auth()->user()->isAdmin() && auth()->id() !== $user->id) {
            abort(403);
        }

        $validated = $request->validate([
            'username'        => ['required','string','min:3','max:50','alpha_dash',
                                  Rule::unique('users','username')->ignore($user->id)],
            'email'           => ['required','email','max:255',
                                  Rule::unique('users','email')->ignore($user->id)],
            'password'        => ['nullable','confirmed','min:8'],
            'profile_picture' => ['nullable','image','max:1024'],
            'account_status'  => ['required', Rule::in(['active','inactive'])],
            'role'            => ['required', Rule::in(['admin','user'])],
        ]);

        if ($request->hasFile('profile_picture')) {
            // احذف الصورة القديمة إن وُجدت
            if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
                Storage::disk('public')->delete($user->profile_picture);
            }
            $validated['profile_picture'] = $request->file('profile_picture')->store('profile_pictures','public');
        }

        // كلمة المرور اختياريّة عند التحديث
        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('users.index')->with('success','تم تحديث المستخدم.');
    }

    public function destroy(User $user)
    {
        // حذف صورة المستخدم أيضاً
        if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        $user->delete();

        return redirect()->route('users.index')->with('success','تم حذف المستخدم.');
    }
}
