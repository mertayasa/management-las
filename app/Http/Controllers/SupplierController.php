<?php

namespace App\Http\Controllers;

use App\DataTables\SupplierDataTable;
use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use App\Repositories\SupplierRepository;
use Exception;
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

    public function dataTable(){
        $suppliers = $this->supplierRepository->getAllData();
        return SupplierDataTable::set($suppliers);
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
        try{
            $this->supplierRepository->destroy($supplier);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return Redirect::back()->with(['error' => 'Gagal menghapus data supplier!']);
        }

        return redirect(route('suppliers.admin.index'))->with(['success' =>  'Berhasil menghapus data supplier!']);
    }
}
