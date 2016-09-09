<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigServidorTables extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        
        Schema::create('sistema_operativo', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('nombre');
            $table->string('arquitectura')->nullable();                    
            
            $table->timestamps();
        });
        
        Schema::create('ambiente', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('nombre'); // Desarrollo, pruebas, capacitacion, produccion, etc
            
            $table->timestamps();
        });
        
        Schema::create('estado_servidor', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('estado'); // ACTIVO, INACTIVO
            
           $table->timestamps();
        });
        
        Schema::create('servidor', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('nombre');
            $table->integer('RAM')->nullable();
            
            $table->integer('ambiente_id')->unsigned();
            $table->foreign('ambiente_id')
                ->references('id')
                ->on('ambiente')
                ->onDelete('cascade');
            
            $table->integer('estado_servidor_id')->unsigned();
            $table->foreign('estado_servidor_id')
                ->references('id')
                ->on('estado_servidor')
                ->onDelete('cascade');
            
            $table->integer('sistema_operativo_id')->unsigned();
            $table->foreign('sistema_operativo_id')
                ->references('id')
                ->on('sistema_operativo')
                ->onDelete('cascade');
            
           $table->timestamps();
        });
        
        Schema::create('direccion_ip', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('ip');
            $table->string('descripcion')->nullable();

            $table->integer('servidor_id')->unsigned();
            $table->foreign('servidor_id')
                ->references('id')
                ->on('servidor')
                ->onDelete('cascade');
            
            $table->timestamps();
        });
        
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('sistema_operativo');
        Schema::drop('ambiente');
        Schema::drop('estado_servidor');
        Schema::drop('servidor');
        Schema::drop('direccion_ip');
    }

}
