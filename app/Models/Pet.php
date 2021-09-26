<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;
    protected $table = "pet";
    protected $guarded = [];

    public function category(){
        return $this->hasOne('App\Models\PetCategory','id', 'pet_category_id');
    }
    
    public function image()
    {
        return $this->hasMany('App\Models\PetImage', 'pet_id');
    }

}
