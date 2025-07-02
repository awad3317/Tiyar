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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('type');
            $table->string('link');
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->date('start_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('price_for_company', 10, 2);
            $table->string('status')->default('in_progress');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
