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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->integer('detail_id');
            $table->foreign('detail_id')->references('id')->on('details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropColumn(['role_id']);
            $table->dropForeign(['detail_id']);
            $table->dropColumn(['detail_id']);
        });
    }
};