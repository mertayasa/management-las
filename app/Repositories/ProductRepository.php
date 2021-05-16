<?php

namespace App\Repositories;
use App\Models\Product;

class ProductRepository{
    public $product;

    public function __construct(Product $product){
        $this->product = $product;
    }

    public function getAllData(){
        return $this->product->with('supplier')->get();
    }

    public function store($data){
        return $this->product->create($data);
    }

    public function update($data, $product){
        return $product->update($data);
    }

    public function destroy($product){
        return $product->delete();
    }
}