<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description','owner_id', 'status'];
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function teamMembers()
    {
        return $this->belongsToMany(User::class, 'project_user');
    }
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

}
