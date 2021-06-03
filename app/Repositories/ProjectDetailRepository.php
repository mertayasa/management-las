<?php

namespace App\Repositories;
use App\Models\ProjectDetail;

class ProjectDetailRepository{
    public $project_detail;

    public function __construct(ProjectDetail $project_detail){
        $this->project_detail = $project_detail;
    }

    public function getAllData(){
        return $this->project_detail->get();
    }

    public function model(){
        return $this->project_detail;
    }

    public function store($data, $project_id){
        foreach($data as $product){
            $project_detail = new ProjectDetail();
            $project_detail->project_id = $project_id;
            $project_detail->product_id = $product[0];
            $project_detail->product_price = $product[1];
            $project_detail->product_amount = $product[2];
            $project_detail->save();
        }
        
        return 1;
        // return $this->project_detail->create($data);
    }

    public function update($data, $project_detail){
        return $project_detail->update($data);
    }

    public function destroy($project_detail){
        return $project_detail->delete();
    }
}