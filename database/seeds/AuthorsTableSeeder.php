<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        //delete authors table records
        DB::table('authors')->delete();
        //insert some dummy records
        DB::table('authors')->insert(array(
            array('author_id' => 1, 'author_name' => 'Larry Ullman', 'email' => 'larry.ullman@domaine.com', 'phone' => '123-456-7890'),
            array('author_id' => 2, 'author_name' => 'Candice Millard',  'email' => 'taylor@domaine.com', 'phone' => '123-456-1234'),
            array('author_id' => 3, 'author_name' => 'Robert Dwight',  'email' => 'robertdwight@example.com', 'phone' => '123-456-4456'),
            array('author_id' => 4, 'author_name' => 'Philippe Rigaux',  'email' => 'philippe@example.com', 'phone' => null),
            array('author_id' => 5, 'author_name' => 'Marco Polo',  'email' => 'marcopolo@example.com', 'phone' => '123-456-7890'), 
            array('author_id' => 6, 'author_name' => 'Tardili Nesta',  'email' => 'tardili@example.com', 'phone' => null),
            array('author_id' => 7, 'author_name' => 'Olesya Tavadze',  'email' => 'olesya@example.com', 'phone' => null),
            array('author_id' => 8, 'author_name' => 'Charles Bruno',  'email' => 'marcopolo@example.com', 'phone' => null),
            array('author_id' => 9, 'author_name' => 'عبد الحليم',  'email' => 'abdelhalim@domaine.com', 'phone' => '123-456-7890'),
        ));
    }

}
