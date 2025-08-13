<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pops', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->boolean('chase')->default(false);
            $table->integer('number');
            $table->foreignUuid('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('license')->nullable();
            $table->foreignUuid('exclusive_id')->nullable()->constrained('exclusives')->onDelete('set null');
            $table->foreignUuid('variant_id')->nullable()->constrained('variants')->onDelete('set null');
            $table->decimal('price_paid', 8, 2);
            $table->decimal('worth', 8, 2);
            $table->date('as_of_date');
            $table->decimal('difference', 8, 2)->nullable();
            $table->string('location')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pops');
    }
};
