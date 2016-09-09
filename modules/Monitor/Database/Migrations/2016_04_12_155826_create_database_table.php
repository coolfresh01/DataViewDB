<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabaseTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_db', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('estado'); // INICIADA, APAGADA
            
           $table->timestamps();
        });
        
        Schema::create('databases', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('sid');
            $table->string('descripcion');
            
            $table->integer('servidor_id')->unsigned();
            $table->foreign('servidor_id')
                ->references('id')
                ->on('servidor')
                ->onDelete('cascade');
            
            $table->integer('estado_db_id')->unsigned();
            $table->foreign('estado_db_id')
                ->references('id')
                ->on('estado_db')
                ->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('estado_db');
        Schema::drop('databases');
    }

}
