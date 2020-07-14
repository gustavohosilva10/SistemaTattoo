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
            $table->longText('base64_image')->nullable();
            $table->longText('base64_photo_perfil')->nullable();
            $table->longText('base64_photo')->nullable();
            $table->string('name_perfil')->nullable();
            $table->string('text_perfil')->nullable();
            $table->longText('base64_promocao1')->nullable();
            $table->string('description1')->nullable();
            $table->longText('base64_promocao2')->nullable();
            $table->string('description2')->nullable();
            $table->longText('base64_promocao3')->nullable();
            $table->string('question1')->nullable();
            $table->string('answer1')->nullable();
            $table->string('question2')->nullable();
            $table->string('answer2')->nullable();
            $table->string('question3')->nullable();
            $table->string('answer3')->nullable();

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
            $table->longText('base64_photo_principal')->nullable();
            $table->string('text_welcome_title')->nullable();
            $table->string('text_welcome')->nullable();
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
            $table->longText('base64_image13')->nullable();
            $table->longText('base64_image14')->nullable();
            $table->longText('base64_image15')->nullable();
            $table->longText('base64_photo_perfil')->nullable();
            $table->longText('base64_photo')->nullable();
            $table->string('name_perfil')->nullable();
            $table->string('text_perfil')->nullable();
            $table->longText('base64_promocao1')->nullable();
            $table->string('description1')->nullable();
            $table->longText('base64_promocao2')->nullable();
            $table->string('description2')->nullable();
            $table->longText('base64_promocao3')->nullable();
            $table->string('question1')->nullable();
            $table->string('answer1')->nullable();
            $table->string('question2')->nullable();
            $table->string('answer2')->nullable();
            $table->string('question3')->nullable();
            $table->string('answer3')->nullable();
        });
    }
}
