<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToernooipartijenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toernooipartijen', function (Blueprint $table) {
            $table->id();
            $table->string('wit');
            $table->string('zwart');
            $table->integer('uitslag')->nullable();
            $table->string('links')->nullable();
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
        Schema::dropIfExists('toernooipartijen');
    }
}
