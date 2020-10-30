<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product =  new \App\Products([
            'name' => "Yamaha C40",
            'description' => "Wooden made in Italy",
            'price' => 129,
            'image' => 'guitar.png',
            'brand' => 'Yamaha',
            'categoryid' => 1
        ]);
        $product->save();

        $product =  new \App\Products([
            'name' => "Fender Player Precision Bass",
            'description' => "Has 4 strings and is very jazzy",
            'price' => 740,
            'image' => 'FenderPlayerPrecisioBass.png',
            'brand' => 'Fender',
            'categoryid' => 2
        ]);
        $product->save();

        $product =  new \App\Products([
            'name' => "Violin m-20",
            'description' => "Made with oak wood and is very stable",
            'price' => 240,
            'image' => 'violin.png',
            'brand' => 'Yamaha',
            'categoryid' => 5
        ]);
        $product->save();

        $product =  new \App\Products([
            'name' => "Piano Fed X",
            'description' => " large musical instrument that you play by pressing black and white keys on a keyboard. ... A piano makes a sound when each key moves a small hammer that strikes a metal string. The inside of",
            'price' => 450,
            'image' => 'piano.png',
            'brand' => 'Fed',
            'categoryid' => 4
        ]);
        $product->save();

        $product =  new \App\Products([
            'name' => "Ukelele",
            'description' => "portable instrument with a small guitar-like body. It consists of a short neck, a main body, four strings and tuning keys",
            'price' => 80,
            'image' => 'ukelele.png',
            'brand' => 'Fazley',
            'categoryid' => 3
        ]);
        $product->save();
    }
}
