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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->float('netSalary');
            $table->float('kpis')->default('00.00');
            $table->float('overtime_byhour');
            $table->integer('numberofdays');
            $table->float('salary_per_day');
            $table->float('absence_per_hour');
            $table->string('insurance');
            $table->float('salary_deduction');
            $table->foreignId('emp_id')->default(1)->constrained('employees')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
