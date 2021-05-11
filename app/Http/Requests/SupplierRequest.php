<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits_between:10,15',
            'address' => 'required|string|max:500',
        ];
    }
}
