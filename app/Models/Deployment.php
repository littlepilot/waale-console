<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deployment extends Model
{
    protected $fillable = [
        'commit_hash',
        'status',
    ];

    protected $casts = [
        'status' => DeploymentStatus::class,
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
