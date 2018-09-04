<?php

namespace App\Models;

use Jenssegers\Model\Model;

class Stock extends Model
{
    public $fillable = ['name', 'volume', 'price'];

    public function setPriceAttribute($price)
    {
        $this->attributes['price'] = $price['amount'];
    }
}
