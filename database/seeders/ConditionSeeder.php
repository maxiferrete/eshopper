<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('conditions')->insert([
            'name' => 'Nuevo'
        ]);
        DB::table('conditions')->insert([
            'name' => 'Usado'
        ]);
    }
}
