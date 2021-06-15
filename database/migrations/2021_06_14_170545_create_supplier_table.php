<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string("name", 50);
            $table->string("surname", 50);
            $table->string("organization", 100);
            $table->string("address", 300);
            $table->string("phone", 13);
            $table->string("other_contact", 300);
            $table->string("supplies", 300);
            $table->enum("profit_index",["1","2","3","4","5"]);
            $table->time("relative_distance");
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
        Schema::dropIfExists('suppliers');
    }
}
