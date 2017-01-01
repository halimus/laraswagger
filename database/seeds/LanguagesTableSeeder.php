<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        //delete languages table records
        DB::table('languages')->delete();
        //insert some dummy records
        DB::table('languages')->insert(array(
            array('language_id' => 1, 'language_name' => 'English'),
            array('language_id' => 2, 'language_name' => 'French'),
            array('language_id' => 3, 'language_name' => 'Russian'),
            array('language_id' => 4, 'language_name' => 'Spanish'),
            array('language_id' => 5, 'language_name' => 'Italian'),
            array('language_id' => 6, 'language_name' => 'Arabic'),
        ));
        
    }

}
