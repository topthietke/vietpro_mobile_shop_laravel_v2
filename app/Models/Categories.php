<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
     //
     protected $table = 'Categories';
     public $timestamps = true;

     protected $fillable = [
         'id','name', 'slug',
     ];
     protected $casts = [
         'created_at' => 'datetime',
     ];
     // Tạo quan hệ 1 vs n với bảng products
     public function products()
    {
        return $this->hasMany(Product::class,'categories_id', 'id');
    }
}
