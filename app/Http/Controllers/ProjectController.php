<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        return view('admin.projects.index');
    }

    public function create(){
        return view('admin.projects.create');
    }

    public function store(Request $request){
        dd($request->all());
    }

    public function show(Project $project){
        //
    }

    public function edit(Project $project){
        //
    }

    public function update(Request $request, Project $project){
        //
    }

    public function destroy(Project $project){
        //
    }
}
