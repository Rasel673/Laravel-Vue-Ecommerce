<?php

use Illuminate\Database\Seeder;


class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *php 
     * @return void
     */
    public function run()
    {
        factory(App\Brand::class,20)->create();;
    }
}
