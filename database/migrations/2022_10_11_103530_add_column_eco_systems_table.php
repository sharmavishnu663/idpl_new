<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnEcoSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eco_systems', function (Blueprint $table) {
            $table->string('logo')->nullable();
            $table->string('play_store_value')->nullable();
            $table->string('app_store_value')->nullable();
        });

        Schema::create('sales_presentation', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('file_name');
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
        Schema::table('eco_systems', function (Blueprint $table) {
            $table->dropColumn('logo');
            $table->dropColumn('play_store_value');
            $table->dropColumn('app_store_value');
        });
        Schema::dropIfExists('sales_presentation');
    }
}
