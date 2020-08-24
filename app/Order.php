<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = ['oid', 'firstname', 'lastname', 'address', 'city', 'province', 'postal', 'phone', 'email', 'total', 'taxes', 'shipping_fee', 'description'];
}
