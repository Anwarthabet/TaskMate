<?php

namespace App\Http\Controllers;
use App\Models\User;
//use App\Models\Task; // سننشئه لاحقًا
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function index()
    {
        $totalUsers   = User::count();
        $activeUsers  = User::where('account_status', 'active')->count();
        $inactiveUsers= User::where('account_status', 'inactive')->count();

        // نفترض أن عندك جدول tasks (إن لم تنشئه بعد، نستطيع لاحقاً)
       // $totalTasks   = Task::count();
        //$doneTasks    = Task::where('status','done')->count();
       // $pendingTasks = Task::where('status','pending')->count();
         $totalTasks   =10;
        $doneTasks    = 78;
        $pendingTasks = 70;

        return view('dashboard.index', compact(
            'totalUsers','activeUsers','inactiveUsers',
            'totalTasks','doneTasks','pendingTasks'
        ));
    }
}
