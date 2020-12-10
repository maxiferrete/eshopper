<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function subcategories(){
        return $this->hasMany('App\Models\Subcategory');
    }

    public function createCategory(){

        for($i=0; $i<15; $i++){
            if($i<5){
                Category::factory()->hasSubcategory(3)->create();
            }else{
                Category::factory()->create();
            }            
        }
    }
}
