<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


      protected $fillable = [
        'title',
        'description',
       
         ];


       
    public function Category()
    {
        return $this->hasMany(Category::class, 'category_id');
    }

    public function Product() {
        return $this->hasMany(Product::class);
    }
     public function Subcategory() {
        return $this->hasMany(Subcategory::class);
    }


}
