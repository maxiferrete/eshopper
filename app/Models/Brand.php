<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public function createBrands(){
        Brand::factory()->count(1500)->create();

        echo 'creadas las 1500 marcars';
    }
}
