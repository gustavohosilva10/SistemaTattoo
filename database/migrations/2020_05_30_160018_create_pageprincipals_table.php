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
            $table->string('text_perfil')->nullable();
            $table->longText('base64_photo_perfil')->nullable();
            $table->longText('base64_photo_principal')->nullable();
            $table->string('text_welcome_title')->nullable();
            $table->string('text_welcome')->nullable();
            $table->longText('base64_photo1')->nullable();
            $table->longText('base64_photo2')->nullable();
            $table->longText('base64_photo3')->nullable();
            $table->longText('base64_photo4')->nullable();
            $table->longText('base64_photo5')->nullable();
            $table->longText('base64_photo6')->nullable();
            $table->longText('base64_photo7')->nullable();
            $table->longText('base64_photo8')->nullable();
            $table->longText('base64_photo9')->nullable();
            $table->longText('base64_photo10')->nullable();
            $table->longText('base64_photo11')->nullable();
            $table->longText('base64_photo12')->nullable();
            $table->longText('base64_photo13')->nullable();
            $table->longText('base64_photo14')->nullable();
            $table->longText('base64_photo15')->nullable();
            $table->longText('base64_photo_coments1')->nullable();
            $table->longText('base64_photo_coments2')->nullable();
            $table->longText('base64_destack1')->nullable();
            $table->longText('base64_destack2')->nullable();
            $table->longText('base64_destack3')->nullable();
            $table->longText('base64_destack4')->nullable();

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
            $table->longText('base64_photo1')->nullable();
            $table->longText('base64_photo2')->nullable();
            $table->longText('base64_photo3')->nullable();
            $table->longText('base64_photo4')->nullable();
            $table->longText('base64_photo5')->nullable();
            $table->longText('base64_photo6')->nullable();
            $table->longText('base64_photo7')->nullable();
            $table->longText('base64_photo8')->nullable();
            $table->longText('base64_photo9')->nullable();
            $table->longText('base64_photo10')->nullable();
            $table->longText('base64_photo11')->nullable();
            $table->longText('base64_photo12')->nullable();
            $table->longText('base64_photo13')->nullable();
            $table->longText('base64_photo14')->nullable();
            $table->longText('base64_photo15')->nullable();
            $table->longText('base64_semana1')->nullable();
            $table->longText('base64_semana2')->nullable();
            $table->longText('base64_semana3')->nullable();
            $table->longText('base64_semana4')->nullable();
        });
    }
}
