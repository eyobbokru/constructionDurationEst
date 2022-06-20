<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_categories')->insert([
            'name' => 'General Parameters',
            'description' => 'General Parameters',


        ]);
        DB::table('sub_categories')->insert([
            'name' => 'Preconstruction Stage Parameters',
            'description' => 'Preconstruction Stage Parameters'

        ]);
        DB::table('sub_categories')->insert([
            'name' => 'Construction Stage Parameters',
            'description' => 'Construction Stage Parameters'

        ]);
        DB::table('sub_categories')->insert([
            'name' => 'Post construction Parameters',
            'description' => 'Post construction Parameters'

        ]);
    }
}
