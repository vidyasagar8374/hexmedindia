<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderproducts extends Model
{
    use HasFactory;
    protected $table ='orderproducts';
     public function productsdetails(){
        return $this->hasMany(product::class, 'id', 'products');
    }
}
