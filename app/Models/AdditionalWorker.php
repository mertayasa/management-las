<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalWorker extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'name',
        'work_day',
        'salary_per_day'
    ];
}
