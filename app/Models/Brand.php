<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public function createBrands(){
        Brand::factory()->count(10)->create();

        echo 'creadas las 10 marcas';
    }
}
