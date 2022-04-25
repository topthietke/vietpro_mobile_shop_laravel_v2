<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    //
    protected $table = 'Customers';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','cus_name', 'cus_gender','cus_birthday','cus_phone','cus_identity_card','cus_address', 'cus_email','cus_password','cus_status','cus_join','google_id','facebook_id',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];
    public function Comments()
    {
        return $this->hasMany(Comments::class,'cusid', 'id');
    }
    public function Orders()
    {
        return $this->hasMany(Orders::class,'cusid', 'id');
    }
}
