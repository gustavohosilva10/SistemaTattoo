<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->longText('base64_photo_principal')->nullable();
            $table->string('text_welcome_title')->nullable();
            $table->string('text_welcome')->nullable();
            $table->string('text_perfil')->nullable();
            $table->longText('base64_image1')->nullable();
            $table->longText('base64_image2')->nullable();
            $table->longText('base64_image3')->nullable();
            $table->longText('base64_image4')->nullable();
            $table->longText('base64_image5')->nullable();
            $table->longText('base64_image6')->nullable();
            $table->longText('base64_image7')->nullable();
            $table->longText('base64_image8')->nullable();
            $table->longText('base64_image9')->nullable();
            $table->longText('base64_image10')->nullable();
            $table->longText('base64_image11')->nullable();
            $table->longText('base64_image12')->nullable();
            $table->longText('base64_photo_perfil')->nullable();
            $table->longText('base64_photo')->nullable();
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
            $table->string('text_perfil')->nullable();
            $table->longText('base64_photo_perfil')->nullable();
            $table->longText('base64_photo_principal')->nullable();
            $table->string('text_welcome_title')->nullable();
            $table->string('text_welcome')->nullable();
            $table->longText('base64_photo')->nullable();
        });
    }
}
