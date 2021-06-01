<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'product_id',
        'product_price',
        'product_amount'
    ];

    public $with = [
        'product'
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
