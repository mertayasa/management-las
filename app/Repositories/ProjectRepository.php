<?php

namespace App\Repositories;
use App\Models\Project;

class ProjectRepository{
    public $project;

    public function __construct(Project $project){
        $this->project = $project;
    }

    public function getAllData(){
        return $this->project->get();
    }

    public function store($data){
        $data = $this->project->create($data);
        return $data;
    }

    public function update($data, $project){
        return $project->update($data);
    }

    public function destroy($project){
        return $project->delete();
    }
}