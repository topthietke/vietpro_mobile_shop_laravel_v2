<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    public $timestamps = true;

    protected $fillable = [
        'name','code','promotion', 'image','price','accessories','warrnty', 'slug','new','status', 'featured','details','catid',
    ];
    //Tạo quan hệ n vs 1 với bảng danh mục
    public function categories()
    {
        return $this->belongsTo(Categories::class, 'catid', 'id');
    }
    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function Comments()
    {
        return $this->hasMany(Comments::class,'prdid', 'id');
    }
}
