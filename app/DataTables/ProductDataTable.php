<?php

namespace App\DataTables;

use Yajra\DataTables\DataTables;

class ProductDataTable{

    static public function set($product){
        return Datatables::of($product)
            ->addColumn('action', function($product){
                $deleteUrl = "'".route('products.admin.delete', $product->id)."', 'productDatatable'";
                return  '<div class="btn-group">'.
                    '<a href="'.route('products.admin.edit',$product->id).'" class="btn btn-warning" ><i class="menu-icon fa fa-pencil-alt"></i></a>'.
                    '<a href="#" onclick="deleteModel('. $deleteUrl .')" class="btn btn-danger" ><i class="menu-icon fa fa-trash"></i></a>'.
                '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }

}

