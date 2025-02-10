<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobResult extends Model
{
    protected $fillable = [
        'user_id', 'status', 'download_url', 'message',
    ];
}