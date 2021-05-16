<?php

namespace App\DataTables;

use Yajra\DataTables\DataTables;

class SupplierDataTable{

    static public function set($supplier){
        return Datatables::of($supplier)
            ->addColumn('action', function($supplier){
                return  '<div class="btn-group">'.
                    '<a href="'.route('suppliers.admin.edit',$supplier->id).'" class="btn btn-warning" ><i class="menu-icon fa fa-pencil-alt"></i></a>'.
                    '<a href="'.route('suppliers.admin.delete',$supplier->id).'" class="btn btn-danger" ><i class="menu-icon fa fa-trash"></i></a>'.
                '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }

}

