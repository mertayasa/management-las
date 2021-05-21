<?php

namespace App\Http\Controllers;

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
        return view('admin.projects.index');
    }

    public function create(){
        $products_raw = $this->productRepository->getAllData();
        $products_raw->SortByDesc('supplier_id');
        $products = [];
        foreach($products_raw as $product){
            $products[$product->id] = '['. $product->supplier->name. ']  '. $product->name;
        }

        return view('admin.projects.create', compact('products'));
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
    
            return response(['code' => 1]);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response(['code' => 0]);
        }
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
