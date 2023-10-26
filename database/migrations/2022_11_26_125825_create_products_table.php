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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('photo')->nullable();
            $table->string('model')->nullable();
            $table->string('pdf')->nullable();
            $table->string('video')->nullable();
            $table->enum('popular', [1, 0])->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_detail_translations');
        Schema::dropIfExists('product_details');

        Schema::dropIfExists('product_photos');

        Schema::dropIfExists('product_overview_translations');
        Schema::dropIfExists('product_overviews');

        Schema::dropIfExists('product_specification_translations');
        Schema::dropIfExists('product_specifications');

        Schema::dropIfExists('products');
    }
};
