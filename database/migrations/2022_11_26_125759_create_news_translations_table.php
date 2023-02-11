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
        Schema::create('new_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('new_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->longText('description');
            $table->unique(['new_id', 'locale']);
            $table->foreign('new_id')->references('id')->on('news')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('new_translations');
    }
};
