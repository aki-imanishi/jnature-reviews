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
                'image1' => 'ayyeX6nUZwP97K7THsRLdAQkO9X1srzT6IWKrcOU.jpg',
                'image2' => '8KS8oWNKXHKKtLVbWSrRNtWgYZRlg46DaFsb3bVG.jpg',
                'image3' => 'bjqipCQhoolwpt87PN3dsGkz9qDwTVmpiKJRyV3F.jpg',
                'information' => 'test' . $i,
            ]);
        }
    }
}
