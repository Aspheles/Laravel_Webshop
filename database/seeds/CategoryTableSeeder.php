<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\Category([
            'id' => 1,
            'name' => 'Guitars',
            'description' => 'The guitar is a string instrument which is played by plucking the strings. The main parts of a guitar are the body, the fretboard, the headstock and the strings. Guitars are usually made from',
        ]);
        $category->save();

        $category = new \App\Category([
            'id' => 2,
            'name' => 'Bass Guitars',
            'description' => 'A bass guitar is a plucked string instrument built in the style of an electric guitar but producing lower frequencies. It produces sound when its metal bass strings vibrate over one or more',
        ]);
        $category->save();

        $category = new \App\Category([
            'id' => 3,
            'name' => 'Ukelele',
            'description' => 'TThe ukulele is a portable instrument with a small guitar-like body. It consists of a short neck, a main body, four strings and tuning keys, a bridge, a fretboard, and a sound hole. There are',
        ]);
        $category->save();

        $category = new \App\Category([
            'id' => 4,
            'name' => "Piano's",
            'description' => 'A piano is a large musical instrument that you play by pressing black and white keys on a keyboard. ... A piano makes a sound when each key moves a small hammer that strikes a metal string.',
        ]);
        $category->save();

        $category = new \App\Category([
            'id' => 5,
            'name' => 'Violins',
            'description' => 'a bowed stringed instrument having four strings tuned at intervals of a fifth and a usual range from G below middle C upward for more than 4¹/₂ octaves and having a shallow body, shoulders at',
        ]);
        $category->save();
    }
}
