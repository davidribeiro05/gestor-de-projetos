<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('description', 255);
            $table->date('start');
            $table->date('delivery')->nullable();
            $table->time('workedHours')->nullable();
            $table->string('status', 25)->default('Iniciado');
            $table->unsignedBigInteger('processes_id');
            $table->timestamps();
            $table->foreign('processes_id')
                ->references('id')
                ->on('processes')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
