<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Supplier;

class Product extends Model{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'unit',
        'supplier_id'
    ];

    protected function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
