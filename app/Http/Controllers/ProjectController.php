<?php

namespace App\Http\Controllers;

use App\DataTables\ProjectDataTable;
use App\Models\AdditionalWorker;
use App\Models\Project;
use App\Models\ProjectDetail;
use App\Repositories\AdditionalWorkerRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ProjectDetailRepository;
use App\Repositories\ProjectRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Queue\Worker;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    protected $productRepository;
    protected $projectRepository;
    protected $projectDetailRepository;
    protected $additionalWorkerRepository;

    public function __construct(ProductRepository $productRepo, ProjectRepository $projectRepo, ProjectDetailRepository $projectDetailRepo, AdditionalWorkerRepository $additionalWorkerRepo){
        $this->productRepository = $productRepo;
        $this->projectRepository = $projectRepo;
        $this->projectDetailRepository = $projectDetailRepo;
        $this->additionalWorkerRepository = $additionalWorkerRepo;
    }

    public function index(){
        // dd($this->projectRepository->model()->additionalWorker);
        return view('admin.projects.index');
    }

    public function dataTable(){
        $projects = $this->projectRepository->getAllData();
        return ProjectDataTable::set($projects);
    }

    public function create(){
        $products_raw = $this->productRepository->getAllData();
        $products_raw->SortByDesc('supplier_id');
        $products = [];
        foreach($products_raw as $product){
            $products[$product->id] = '['. $product->supplier->name. ']  '. $product->name;
        }

        $display = 'd-none';

        return view('admin.projects.create', compact('products', 'display'));
    }

    public function store(Request $request){
        try{
            $data = $request->all();
            $new_project = $this->projectRepository->store($data);
            $workers = [];
            $products = [];
            
            foreach($data as $key => $value){
                if(str_contains($key, 'worker')){
                    array_push($workers, $value);
                }
    
                if(str_contains($key, 'product')){
                    array_push($products, $value);
                }
            }
            
            if($data['type'] == 1){
                $this->additionalWorkerRepository->store($workers, $new_project->id);
            }
    
            $this->projectDetailRepository->store($products, $new_project->id);
            session()->flash('success', 'Berhasil menambahkan proyek');
    
            return response(['code' => 1, 'url' => route('projects.admin.index')]);
        }catch(Exception $e){
            Log::info($e->getMessage());
            session()->flash('error', 'Gagal menambahkan proyek');
            return response(['code' => 0, 'url' => 'reload']);
        }
    }

    public function show(Project $project){
        //
    }

    public function edit(Project $project){
        $products_raw = $this->productRepository->getAllData();
        $products_raw->SortByDesc('supplier_id');
        $products = [];
        foreach($products_raw as $product){
            $products[$product->id] = '['. $product->supplier->name. ']  '. $product->name;
        }

        $display = $project->type == 0 ? 'd-none' : 'd-block';

        return view('admin.projects.edit', compact('project', 'products', 'display'));
    }

    public function update(Request $request, Project $project){
        //
    }

    public function destroy(Project $project){
        //
    }
}
