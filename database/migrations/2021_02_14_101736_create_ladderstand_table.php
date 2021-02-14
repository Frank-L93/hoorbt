<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLadderstandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ladderstand', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('win')->nullable();
            $table->integer('draw')->nullable();
            $table->integer('lost')->nullable();
            $table->double('score')->nullable();
            $table->integer('tpr')->nullable();
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
        Schema::dropIfExists('ladderstand');
    }
}
