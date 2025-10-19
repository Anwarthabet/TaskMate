<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'file',
        'status',
        'due_date',
        'project_id',
        'assigned_to',
    ];
   
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
