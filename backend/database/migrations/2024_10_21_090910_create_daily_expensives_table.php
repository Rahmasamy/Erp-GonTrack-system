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
        Schema::create('daily_expensives', function (Blueprint $table) {
            $table->id();
            $table->date('expenses_date');
            $table->double('daily_expense');
            $table->foreignId('client_id')->constrained('clinets')->cascadeOnDelete();
            $table->foreignId('acount_id')->constrained('acounts')->cascadeOnDelete();
            $table->foreignId('page_id')->constrained('pages')->cascadeOnDelete();
            $table->foreignId('campgian_id')->constrained('campgians')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_expensives');
    }
};
