<?php

use Illuminate\Database\Seeder;
use App\Http\TravelPackage;
class TravelPackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TravelPackage::create(
            ['title' => 'Liburan Murah Ke Bali','slug'=>'liburan-murah-ke-bali','location' => 'Bali','status'=>'active','images'=>'default.jpg'],
        
        );
    }
}
