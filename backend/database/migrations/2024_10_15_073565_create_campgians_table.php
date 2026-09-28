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
        Schema::create('campgians', callback: function (Blueprint $table) {
            $table->id();
            $table->string('campagian_name','80');
            $table->string('status')->default('not active');
            $table->date('camp_date');
            $table->foreignId('acount_id')->constrained('acounts')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campgians');
    }
};
