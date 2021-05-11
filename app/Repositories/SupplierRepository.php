<?php

namespace App\Repositories;
use App\Models\Supplier;

class SupplierRepository{
    public $supplier;

    public function __construct(Supplier $supplier){
        $this->supplier = $supplier;
    }

    public function getAllData(){
        return $this->supplier->all();
    }

    public function store($data){
        return $this->supplier->create($data);
    }

    public function update($data, $supplier){
        return $supplier->update($data);
    }
}