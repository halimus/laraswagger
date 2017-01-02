<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        $this->insert();
        //$this->delete();
    }
    
    /*
     * 
     */
    public function insert(){
        $this->call(UsersTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(FieldsTableSeeder::class);
        $this->call(AuthorsTableSeeder::class);
        $this->call(BooksTableSeeder::class);
    }
    
    /*
     * 
     */
    public function delete(){
        Schema::drop('migrations');
        Schema::drop('password_resets');
        Schema::drop('users');
        Schema::drop('books');
        Schema::drop('authors');
        Schema::drop('fields');
        Schema::drop('languages');
        
    }
}
