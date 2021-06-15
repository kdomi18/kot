<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vet_id');
            $table->foreign('vet_id')
                ->references('id')
                ->on('vets')
                ->onDelete('cascade');
            $table->string('medication');
            $table->dateTime('date');
            $table->dateTime("next_date")->nullable();
            $table->decimal('price', 8, 2);
            $table->string('notes', 400);
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
        Schema::dropIfExists('vaccines');
    }
}
