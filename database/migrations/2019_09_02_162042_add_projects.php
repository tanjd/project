<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* `tutorial`.`projects` */
        /* insert data
        DB::table('projects')->insert(array(
            array('id' => '1', 'title' => 'My first project!!!', 'description' => 'Lorem ipsum!!!', 'created_at' => '2019-09-02 10:56:07', 'updated_at' => '2019-09-02 14:07:20'),
            array('id' => '2', 'title' => 'My second project', 'description' => 'Lorem ipsum', 'created_at' => '2019-09-02 10:58:08', 'updated_at' => '2019-09-02 10:58:08')
        ));
        */
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
