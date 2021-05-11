<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product;

class Supplier extends Model{
    use HasFactory;
    use SoftDeletes;

    public $fillable = [
        'name',
        'phone',
        'address'
    ];
    
    public $with = [
        'products'
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
