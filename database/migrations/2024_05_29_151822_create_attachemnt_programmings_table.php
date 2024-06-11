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
        Schema::create('attachment_programmings', function (Blueprint $table) {
            $table->id();
            $table->text('file')->nullable();
            $table->date('expiration_date');
            $table->unsignedBigInteger('programming_id');
            $table->foreign('programming_id')->references('id')->on('programmings')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachemnt_programmings');
    }
};
