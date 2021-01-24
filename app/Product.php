<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primarykey = 'id';
    protected $fillable = ['name','price','quantity','active','description'];
}
