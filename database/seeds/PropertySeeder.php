<?php

use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('properties')->insert([
        'name' => 'Building ABC',
      ]);

      DB::table('properties')->insert([
        'name' => 'House ABC',
      ]);
    }
}
