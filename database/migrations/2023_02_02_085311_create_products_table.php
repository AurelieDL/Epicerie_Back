<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('quantity');
            $table->enum('packaging', ['kilo','pack','unit','bottle','can']);
            $table->float('price_ht');
            $table->float('tva');
            $table->float('margin_rate');
            $table->float('price_ttc');
            $table->integer('created_by')->unsigned()->nullable();

            $table->foreign('created_by')->references('id')->on('users');
        });


            
       


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropColumn(['created_by']);
        });
        Schema::dropIfExists('products');
    }
};
