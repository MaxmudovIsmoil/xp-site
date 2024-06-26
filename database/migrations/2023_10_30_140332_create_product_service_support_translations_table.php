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
        Schema::create('product_service_support_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_service_support_id')->nullable();
            $table->string('locale')->index();
            $table->string('name');
            $table->longText('description');
//            $table->unique(['product_service_support_id', 'locale']);
            $table->foreign('product_service_support_id', 'pss_trans_pss_id_foreign')
                ->references('id')
                ->on('product_service_supports')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_service_support_translations');
    }
};
