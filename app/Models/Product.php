<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }

    public function condition()
    {
        return $this->belongsTo('App\Models\Condition');
    }

    public function category(){
        return $this->belongsTo('App\Models\Brand');
    }

    public function subcategory(){
        return $this->belongsTo('App\Models\Brand');
    }
}
