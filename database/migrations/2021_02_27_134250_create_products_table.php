<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('subcategory_id')->nullable()->constrained('sub_categories')->onDelete('cascade');
            $table->foreignId('subsubcategory_id')->nullable()->constrained('sub_sub_categories')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->string('code');
            $table->string('color')->nullable();
            $table->double('price');
            $table->double('discount');
            $table->string('weight')->nullable();
            $table->integer('stock')->nullable();
            $table->string('main_image')->nullable();
            $table->text('description');
            $table->string('wash_care')->nullable();
            $table->string('fabric')->nullable();
            $table->string('pattern')->nullable();
            $table->string('sleeve')->nullable();
            $table->string('fit')->nullable();
            $table->string('occassion')->nullable();
            $table->integer('is_featured')->nullable();
            $table->tinyInteger('status');
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
        Schema::dropIfExists('products');
    }
}
