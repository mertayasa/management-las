<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\AdditionalWorker;

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

    public $with = [
        'additionalWorker', 'projectDetail'
    ];

    public function additionalWorker(){
        return $this->hasMany(AdditionalWorker::class);
    }

    public function projectDetail(){
        return $this->hasMany(ProjectDetail::class);
    }

    public function getProjectDurationAttribute($value){
        $start_date = Carbon::parse($this->start);
        $end_date = Carbon::parse($this->end);
        return $start_date->diffInDays($end_date);
    }

    public function getWorkerSalaryAttribute(){
        $worker_salary = 0;
        foreach($this->additionalWorker as $worker){
            $worker_salary = $worker_salary + ($worker->salary_per_day * $worker->work_day);
        }

        return $worker_salary;
    }

    public function getProductTotalAttribute(){
        $product_total = 0;
        foreach($this->projectDetail as $product){
            $product_total = $product_total + ($product->product_price * $product->product_amount);
        }

        return $product_total;
    }

    public function getTotalAttribute(){
        $assembly_charge = $this->assembly_charge;
        $salary = 0;
        $product_amount = 0;
        
        foreach($this->additionalWorker as $worker){
            $salary = $salary + ($worker->salary_per_day * $worker->work_day);
        }

        foreach($this->projectDetail as $product){
            $product_amount = $product_amount + ($product->product_price * $product->product_amount);
        }

        return $product_amount + $salary + $assembly_charge;
    }
}
