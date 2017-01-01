<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        //delete books table records
        DB::table('books')->delete();
        //insert some dummy records
        DB::table('books')->insert(array(
            array('book_id' => 1,  'title' => 'Hero of the Empire', 'pages_count' => '120', 'published_date' => '2012-12-23', 'price' => '17.93', 'quantity' => '4', 'author_id' => '2', 'field_id' => '1', 'language_id' => '1'),
            array('book_id' => 2,  'title' => 'PHP and MySQL for Dynamic Web Sites', 'pages_count' => '234', 'published_date' => '2015-06-14', 'price' => '32.99', 'quantity' => '7', 'author_id' => '1', 'field_id' => '3', 'language_id' => '1'),
            array('book_id' => 3,  'title' => "Murach's PHP and MySQL", 'pages_count' => '87', 'published_date' => '2016-06-11', 'price' => '12.00', 'quantity' => '10', 'author_id' => '1', 'field_id' => '3', 'language_id' => '1'),
            array('book_id' => 4,  'title' => 'Pratique de MySQL et PHP', 'pages_count' => '117', 'published_date' => '2013-05-22', 'price' => '53.23', 'quantity' => '8', 'author_id' => '4', 'field_id' => '3', 'language_id' => '2'),
            array('book_id' => 5,  'title' => 'El Millón, los viajes de Marco Polo', 'pages_count' => '120', 'published_date' => '2003-04-04', 'price' => '11.99', 'quantity' => '3', 'author_id' => '5', 'field_id' => '2', 'language_id' => '4'),
            array('book_id' => 6,  'title' => 'Learn PHP in 24 Hours or Less', 'pages_count' => '144', 'published_date' => '2011-04-28', 'price' => '11', 'quantity' => '41', 'author_id' => '3', 'field_id' => '3', 'language_id' => '1'),
            array('book_id' => 7,  'title' => 'PHP for the Web', 'pages_count' => '67', 'published_date' => '2011-04-28', 'price' => '7.23', 'quantity' => '24', 'author_id' => '2', 'field_id' => '1', 'language_id' => '1'),
            array('book_id' => 8,  'title' => 'El Nuevo Mundo', 'pages_count' => '99', 'published_date' => '2016-11-29', 'price' => '18.22', 'quantity' => '3', 'author_id' => '5', 'field_id' => '2', 'language_id' => '4'),
            array('book_id' => 9,  'title' => 'Ancient Rome', 'pages_count' => '455', 'published_date' => '2014-12-12', 'price' => '5.99', 'quantity' => '2', 'author_id' => '6', 'field_id' => '1', 'language_id' => '5'),
            array('book_id' => 10, 'title' => 'Бусунсул и Паскуалина', 'pages_count' => '67', 'published_date' => '2007-01-07', 'price' => '8', 'quantity' => '0', 'author_id' => '7', 'field_id' => '1', 'language_id' => '3'),
            array('book_id' => 11, 'title' => 'La deuxieme guerre mondiale', 'pages_count' => '357', 'published_date' => '1994-07-04', 'price' => '25', 'quantity' => '1', 'author_id' => '8', 'field_id' => '1', 'language_id' => '2'),
            array('book_id' => 12, 'title' => 'الحرب العالمية الثانية', 'pages_count' => '324', 'published_date' => '1999-02-01', 'price' => '33.39', 'quantity' => '1', 'author_id' => '9', 'field_id' => '1', 'language_id' => '6'), 
        ));
        
    }

}

