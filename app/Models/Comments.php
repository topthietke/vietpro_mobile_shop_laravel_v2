<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'Comment';
    public $timestamps = true;
    protected $fillable = [
        'cusid','prdid','com_detail','com_status',
    ];
    protected $casts = [
        'created_at' => 'datetime',
    ];
    // Tạo quan hệ 1 vs n với bảng products
    public function Products()
    {
        return $this->belongsTo(Products::class, 'prdid', 'id');
    }
    public function Customers()
    {
        return $this->belongsTo(Customers::class, 'cusid', 'id');
    }
}
