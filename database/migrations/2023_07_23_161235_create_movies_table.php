<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title',100)->unique();
            $table->string('title_eng',100)->unique();
            $table->string('slug',100)->unique();
            $table->longText('desc');
            $table->string('image');
            $table->string('year')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('genre_id');
            $table->unsignedBigInteger('country_id');
            $table->tinyInteger('status')->default(1);
            $table->integer('feature')->default(0)->comment('0: ẩn, 1: nổi bật');
            $table->string('definition')->default('HD')->comment('HD ,full HD');
            $table->string('subtitles')->default('Viet Sub')->comment('VietSub,  Thuyet Minh');
        
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
