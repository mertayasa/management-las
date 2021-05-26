<?php

namespace App\DataTables;

use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class ProjectDataTable{

    static public function set($project){
        return Datatables::of($project)
            ->editColumn('type', function($project){
                if($project->type){
                    return 'Borongan';
                }
                return 'Harian';
            })
            ->editColumn('progress', function($project){
                return getProgress($project->progress);
            })
            ->editColumn('start', function($project){
                return Carbon::parse($project->start)->format('d-F-Y');
            })
            ->editColumn('end', function($project){
                return Carbon::parse($project->end)->format('d-F-Y');
            })
            ->editColumn('assembly_charge', function($project){
                return formatPrice($project->assembly_charge);
            })
            ->addColumn('total', function($project){
                return formatPrice($project->total);
            })
            ->addColumn('product_total', function($project){
                return formatPrice($project->product_total);
            })
            ->addColumn('worker_salary', function($project){
                return formatPrice($project->worker_salary);
            })
            ->addColumn('action', function($project){
                $deleteUrl = "'".route('projects.admin.delete', $project->id)."', 'projectDatatable'";
                return  '<div class="btn-group">'.
                    '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#projectProgressModal" onclick="updateProjectProgress('.$project->progress.')">
                        <i class="fas fa-tasks"></i>
                    </button>'.
                    '<a href="'.route('projects.admin.edit',$project->id).'" class="btn btn-warning" ><i class="menu-icon fa fa-pencil-alt"></i></a>'.
                    '<a href="#" onclick="deleteModel('. $deleteUrl .')" class="btn btn-danger" ><i class="menu-icon fa fa-trash"></i></a>'.
                '</div>';

                
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }

}