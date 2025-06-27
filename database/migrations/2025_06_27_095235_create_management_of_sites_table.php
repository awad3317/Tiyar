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
        Schema::create('management_of_sites', function (Blueprint $table) {
            $table->id();
            $table->string('site_user')->nullable();
            $table->string('server_password')->nullable();
            $table->string('ssh')->nullable();
            $table->text('notes')->nullable();
            $table->string('domain')->nullable();
            $table->string('client_name')->nullable();
            $table->string('db_name')->nullable();
            $table->string('db_username')->nullable();
            $table->string('db_password')->nullable();
            $table->string('db_user')->nullable();
            $table->foreignId('management_id')->constrained('managements')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('management_of_sites');
    }
};
