<?php

namespace App\Repositories;
use App\Models\AdditionalWorker;

class AdditionalWorkerRepository{
    public $additional_worker;

    public function __construct(AdditionalWorker $additional_worker){
        $this->additional_worker = $additional_worker;
    }

    public function getAllData(){
        return $this->additional_worker->get();
    }

    public function model(){
        return $this->additional_worker;
    }

    public function store($data, $project_id){
        foreach($data as $worker){
            $additional_worker = new AdditionalWorker();
            $additional_worker->project_id = $project_id;
            $additional_worker->name = $worker[0];
            $additional_worker->work_day = $worker[1];
            $additional_worker->salary_per_day = $worker[2];
            $additional_worker->save();
        }
        // return $this->additional_worker->create($data);
    }

    public function update($data, $additional_worker){
        return $additional_worker->update($data);
    }

    public function destroy($additional_worker){
        return $additional_worker->delete();
    }
}