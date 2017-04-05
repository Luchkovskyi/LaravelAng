<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
//    /**
//     * Run the database seeds.
//     *
//     * @return void
//     */
    public function run()
    {
//        DB::table('categories')->insert([
//            'name'=>"notebook",
//        ]);
//        DB::table('categories')->insert([
//            'name'=>"monitor",
//        ]);
//        DB::table('categories')->insert([
//        'name'=>"TV",
//        ]);
//
//        DB::table('goods')->insert([
//            'name'=>"Acer 7739g",
//            'description'=>"Intel i7,RAM 16gb, 17.0, 1TB",
//            'categories_id'=>1,
//            'image'=>"images/acer1.jpg"
//        ]);
//        DB::table('goods')->insert([
//            'name'=>"Acer 1577re",
//            'description'=>"Intel i5,RAM 8gb, 15.6, 500gb",
//            'categories_id'=>1,
//            'image'=>"images/acer2.jpg"
//        ]);
//
//        DB::table('goods')->insert([
//            'name'=>"Sumsung 5000",
//            'description'=>"40",
//            'categories_id'=>2,
//            'image'=>"images/sumsung.jpg"
//        ]);
//        DB::table('goods')->insert([
//            'name'=>"LG 5220",
//            'description'=>"32",
//            'categories_id'=>2,
//            'image'=>"images/LG.jpg"
//        ]);
        DB::table('supplier')->insert([
            'supplierName'=>"Stas13",
            'supplierEmail'=>"Luca@gmail.com",
            'supplierContact'=>"798465",
            'supplierPosition'=>"home"
        ]);
        DB::table('supplier')->insert([
            'supplierName'=>"Vasia15",
            'supplierEmail'=>"ASD@gmail.com",
            'supplierContact'=>"7456c3",
            'supplierPosition'=>"work13"
        ]);

    }
}
