<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'start',
        'end',
        'detail',
        'type',
        'progress',
        'assembly_charge'
    ];

    public function personInCharge(){
        return $this->hasMany(PersonInCharge::class);
    }

    public function getProjectDurationAttribute($value){
        $start_date = Carbon::parse($this->start);
        $end_date = Carbon::parse($this->end);
        return $start_date->diffInDays($end_date);
    }
}
