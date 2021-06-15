<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivestockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livestock', function (Blueprint $table) {
            $table->id();
            $table->string('tag');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')
                ->onDelete('cascade');
            $table->foreignId('buyer_id')->nullable()->constrained('buyers');
            $table->string("relative_id");
            $table->decimal('buying_price', 8,2);
            $table->decimal('selling_price', 8,2)->nullable();
            $table->string('breed');
            $table->boolean('vaccinated');
            $table->unsignedBigInteger('vaccine_id');
            $table->foreign('vaccine_id')
                ->references('id')
                ->on('vaccines')
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
        Schema::dropIfExists('livestock');
    }
}
