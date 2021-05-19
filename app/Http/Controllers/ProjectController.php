<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepo){
        $this->productRepository = $productRepo;
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
        Log::info($request->all());
        $data = $request->all();
        // Project::create($data);
        return response($request->all(), 200);
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
