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
//            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreignId('buyer_id')->nullable()->constrained('buyers');
//            $table->foreign('buyer_id')->references('id')->on('buyers');
            $table->string("relative_id");
            $table->decimal('buying_price', 8,2);
            $table->decimal('selling_price', 8,2)->nullable();
            $table->string('breed');
            $table->boolean('vaccinated');
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
