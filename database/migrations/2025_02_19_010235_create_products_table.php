<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

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
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2); // Ubah menjadi decimal(10, 2)
            $table->decimal('discount_price', 10, 2)->nullable(); // Ubah menjadi decimal(10, 2)
            $table->integer('stock')->nullable();
            $table->enum('type', ['digital', 'physical']);
            $table->string('image_url')->nullable();
            $table->string('video_url')->nullable();
            $table->string('license_type')->nullable();
            $table->timestamp('license_expiry')->nullable();
            $table->integer('download_limit')->nullable(); // Ubah ke nullable
            $table->boolean('is_active')->nullable(); // Ubah ke nullable
            $table->boolean('is_returnable')->nullable(); // Ubah ke nullable
            $table->integer('warranty_period')->nullable();
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('parent_category_id')->nullable()->constrained('categories')->onDelete('set null');
            $table->boolean('physical_shipping')->nullable(); // Ubah ke nullable
            $table->foreignId('shipping_method_id')->nullable()->constrained('shipping_methods')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
            $table->index(['category_id', 'price']);
            $table->index('title');
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
