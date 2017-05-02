<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerInfo extends Model
{
    protected $fillable = ['seller_name','seller_email','seller_mobile','seller_phone','product_name','product_image','location','product_prize','negotiable','condition'];
}
