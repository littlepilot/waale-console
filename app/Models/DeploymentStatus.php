<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

enum DeploymentStatus: string
{
    case Pending = 'pending';
    case Running = 'running';
    case Failed = 'failed';
    case Deployed = 'deployed';
}
