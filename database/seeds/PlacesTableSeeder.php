<?php

use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i <= 10; $i++){
            DB::table('places')->insert([
                'name' => 'name' . $i,
                'address' => '日本',
                'access' => 'test' . $i,
                'homepage' => 'test' . $i,
                'content' => 'test' . $i,
                'image1' => 'images/places/IMG_nezu1.JPG',
                'image2' => 'images/places/IMG_nezu2.JPG',
                'image3' => 'images/places/IMG_nezu3.JPG',
                'information' => 'test' . $i,
            ]);
        }
    }
}
