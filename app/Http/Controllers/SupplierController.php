<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use App\Repositories\SupplierRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class SupplierController extends Controller{

    public $supplierRepository;

    public function __construct(SupplierRepository $supplierRepo){
        $this->supplierRepository = $supplierRepo;
    }

    public function index(){
        return view('admin.suppliers.index');
    }

    public function create(){
        return view('admin.suppliers.create');
    }

    public function store(SupplierRequest $request){
        try{
            $data = $request->all();
            $this->supplierRepository->store($data);
        }catch(Exception $e){
            return Redirect::back()->withInput()->with(['error' => 'Gagal menyimpan data supplier!']);
            Log::info($e->getMessage());
        }

        return redirect(route('suppliers.admin.index'))->with(['success' =>  'Berhasil menyimpan data supplier!']);
    }

    public function show(Supplier $supplier){

    }

    public function edit(Supplier $supplier){
        return view('admin.suppliers.edit', compact('supplier'));
    }

    public function update(SupplierRequest $request, Supplier $supplier){
        try{
            $data = $request->all();
            $this->supplierRepository->update($data, $supplier);
        }catch(Exception $e){
            return Redirect::back()->withInput()->with(['error' => 'Gagal mengubah data supplier!']);
            Log::info($e->getMessage());
        }

        return redirect(route('suppliers.admin.index'))->with(['success' =>  'Berhasil mengubah data supplier!']);
    }

    public function destroy(Supplier $supplier){
        //
    }
}
