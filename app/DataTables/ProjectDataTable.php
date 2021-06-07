<?php

namespace App\DataTables;

use Carbon\Carbon;
use Collective\Html\FormFacade;
use Illuminate\Support\Facades\Auth;
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
                if(checkUserLevel() == 'admin'){
                    return FormFacade::select('progress', [0 => 'Proyek Baru', 1 => 'Pembelian Bahan', 2 => 'Pengerjaan', 3 => 'Pemasangan', 4 => 'Selesai'], $project->progress, ['id' => 'projectType', 'onchange' => 'updateProgressProyek(this.value, '. $project->id .')', 'class' => 'form-control']);
                }
                
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
            ->editColumn('approved', function($project){
                return isApproved($project);
            })
            ->addColumn('action', function($project){
                if(checkUserLevel() == 'admin'){
                    $deleteUrl = "'".route('projects.admin.delete', $project->id)."', 'projectDatatable'";
                    return  '<div class="btn-group">'.
                        '<a href="'.route('projects.admin.show_rab', $project->id).'" class="btn btn-primary">
                            <i class="fas fa-tasks"></i>
                        </a>'.
                        '<a href="'.route('projects.admin.edit',$project->id).'" class="btn btn-warning" ><i class="menu-icon fa fa-pencil-alt"></i></a>'.
                        '<a href="#" onclick="deleteModel('. $deleteUrl .')" class="btn btn-danger" ><i class="menu-icon fa fa-trash"></i></a>'.
                    '</div>';
                }

                return  '<div class="btn-group">'.
                    '<a href="'.route('projects.admin.show_rab', $project->id).'" class="btn btn-primary">
                        <i class="fas fa-tasks"></i>
                    </a>';                
            })->addIndexColumn()->rawColumns(['action', 'approved'])->make(true);
    }

}