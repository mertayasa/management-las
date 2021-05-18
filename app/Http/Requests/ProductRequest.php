<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        $rules = [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'unit' => 'required|string|max:100'
        ];

        if ($this->getMethod() == 'POST') {
            $rules += ['supplier_id' => 'required|integer|exists:App\Models\Supplier,id'];
        }

        return $rules;

    }
}
