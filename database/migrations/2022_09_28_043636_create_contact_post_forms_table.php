<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactPostFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_post_forms', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->nullable();
            $table->string('mobile', 100)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('location')->nullable();
            $table->string('city')->nullable();
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
        Schema::dropIfExists('contact_post_forms');
    }
}
