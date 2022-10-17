<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductThemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_themes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('color_class');
            $table->timestamps();
        });
        Schema::table('eco_systems', function (Blueprint $table) {
            $table->integer('theme_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_themes');
    }
}
