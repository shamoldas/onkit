<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

      protected $fillable = [
        'title',
        'description',
        'subcategory_id',
        'price',
        'thumbnail',
    ];




    public function Category()
    {
        return $this->hasMany(Category::class);
    }

    public function Product() {
        return $this->hasMany(Product::class);
    }
     public function Subcategory() {
        return $this->hasMany(Subcategory::class);
    }




}
