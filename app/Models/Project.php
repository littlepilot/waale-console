<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function owners()
    {
        return $this->belongsToMany(User::class, 'project_users', 'project_id', 'user_id')
            ->wherePivot('role', 'owner')
            ->withTimestamps();
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'project_users', 'project_id', 'user_id')
            ->wherePivot('role', 'member')
            ->withTimestamps();
    }
}
