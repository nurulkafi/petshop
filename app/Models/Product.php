<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "product";
    protected $guarded = [];

    public function category(){
        return $this->hasOne('App\Models\ProductCategory','id', 'product_category_id');
    }

    public function image(){
       return $this->hasMany('App\Models\ProductImage','product_id');
    }

    public static function reduceStock($id, $stock)
    {
        $inventory = self::where('id', $id)->firstOrFail();
        $inventory->stock = $inventory->stock - $stock;
        $inventory->save();
    }
}
