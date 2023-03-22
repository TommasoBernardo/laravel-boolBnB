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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('slug', 255)->unique();
            $table->string('title', 150)->nullable(false)->uniqid();
            $table->tinyInteger('rooms')->unsigned()->nullable(false);
            $table->tinyInteger('beds')->unsigned()->nullable(false);
            $table->tinyInteger('bathrooms')->unsigned()->nullable(false);
            $table->integer('square_meters')->unsigned()->nullable(false);
            $table->boolean('visible')->nullable(false);
            $table->text('address')->nullable(false);
            $table->text('cover_image')->nullable(false);
            $table->float('longitude', 8, 5)->nullable(false);
            $table->float('latitude', 8, 5)->nullable(false);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments');
    }
};
