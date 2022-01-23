<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Nvidia GeForce RTX 3090',
            'type' => 'GPU',
            'entrydate' => '2022-01-22',
            'stock' => '27',
        ]);
    }
}
