<?php

namespace App\Http\Controllers;

use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller{
    
    protected $projectRepo;

    public function __construct(ProjectRepository $projectRepo){
        $this->projectRepo = $projectRepo;
    }

    public function index(){
        $all_project = $this->projectRepo->getAllData();
        
        $product_total = array_sum($all_project->pluck('product_total')->toArray());
        $worker_total = array_sum($all_project->pluck('worker_salary')->toArray());
        $project_total = array_sum($all_project->pluck('total')->toArray());
        
        $revenue = $project_total - $worker_total - $product_total;

        $workload_data = json_encode($this->getProjectWorkload(), true);
        $workload_label = json_encode(['Proyek Baru', 'Pembelian Bahan', 'Pengerjaan', 'Pemasangan', 'Selesai'], true);

        $total_project = $all_project->count();
        $unfinished_project = $all_project->where('progress', '!=', 4)->count();

        $project_deadlines = $this->projectRepo->model()->where('progress', '!=', 4)->orderBy('end', 'ASC')->take(5)->get();

        return view('admin.dashboard.index', compact('total_project', 'unfinished_project', 'revenue', 'project_total', 'workload_data', 'workload_label', 'project_deadlines'));
    }

    private function getProjectWorkload(){
        $all_project = $this->projectRepo->getAllData();
        $workload = [];

        $workload[0] = $all_project->where('progress', 0)->count();
        $workload[1] = $all_project->where('progress', 1)->count();
        $workload[2] = $all_project->where('progress', 2)->count();
        $workload[3] = $all_project->where('progress', 3)->count();
        $workload[4] = $all_project->where('progress', 4)->count();

        return $workload;
    }
}
