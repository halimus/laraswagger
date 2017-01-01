<?php

use Illuminate\Database\Seeder;

class FieldsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        //delete fields table records
        DB::table('fields')->delete();
        //insert some dummy records
        DB::table('fields')->insert(array(
            array('field_id' => 1, 'field_name' => 'Historical'),
            array('field_id' => 2, 'field_name' => 'Geographic'),
            array('field_id' => 3, 'field_name' => 'Programming'),
            array('field_id' => 4, 'field_name' => 'Mathematic')
        ));
    }

}
