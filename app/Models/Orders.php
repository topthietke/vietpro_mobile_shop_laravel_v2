<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = [
        'cusid','total','state',
    ];

    public function Customers()
    {
        return $this->belongsTo(Customers::class,'cusid', 'id');
    }
    public function orderdetails ()
    {
        return $this->hasMany(OrderDetails::class,'ordid', 'id');
    }
}
