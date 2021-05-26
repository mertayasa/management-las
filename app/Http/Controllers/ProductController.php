<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Repositories\SupplierRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller{

    public $productRepository;
    public $supplierRepository;

    public function __construct(ProductRepository $productRepo, SupplierRepository $supplierRepo){
        $this->productRepository = $productRepo;
        $this->supplierRepository = $supplierRepo;
    }
    
    public function index(){
        return view('admin.products.index');
    }

    public function dataTable(){
        $products = $this->productRepository->getAllData();
        return ProductDataTable::set($products);
    }

    public function create(){
        $suppliers = $this->supplierRepository->getAllData()->pluck('name', 'id');
        $units = ['Meter' => 'Meter', 'Kaki' => 'Kaki', 'Fahrenheit' => 'Fahrenheit'];
        return view('admin.products.create', compact('suppliers', 'units'));
    }

    public function store(ProductRequest $request){
        try{
            $data = $request->all();
            $this->productRepository->store($data);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return Redirect::back()->withInput()->with(['error' => 'Gagal menyimpan data bahan baku!']);
        }

        return redirect(route('products.admin.index'))->with(['success' =>  'Berhasil menyimpan data bahan baku!']);
    }

    public function show(Product $product){
        //
    }

    public function productPrice(Product $product){
        return $product->price;
    }

    public function edit(Product $product){
        $supplier = $product->supplier->name;
        $units = ['Meter' => 'Meter', 'Kaki' => 'Kaki', 'Fahrenheit' => 'Fahrenheit'];
        return view('admin.products.edit', compact('product', 'units', 'supplier'));
    }

    public function update(ProductRequest $request, Product $product){
        try{
            $data = $request->all();
            $this->productRepository->update($data, $product);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return Redirect::back()->withInput()->with(['error' => 'Gagal mengubah data bahan baku!']);
        }

        return redirect(route('products.admin.index'))->with(['success' =>  'Berhasil mengubah data bahan baku!']);
    }

    public function destroy(Product $product){
        try{
            $this->productRepository->destroy($product);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus bahan baku']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus bahan baku']);
    }
}
