<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageprincipalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pageprincipals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text_welcome_title')->nullable();
            $table->string('text_welcome')->nullable();
            $table->string('base64_img_profile')->nullable();
            $table->string('name_perfil')->nullable();
            $table->string('text_perfil')->nullable();

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
        Schema::table('pageprincipals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text_welcome_title');
            $table->string('text_welcome');

        });
    }
}
