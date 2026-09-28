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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_method');
            $table->double('amount'); // amount the client paid
            $table->foreignId('page_id')->constrained(table: 'pages')->cascadeOnDelete();
            $table->foreignId('account_id')->constrained(table: 'acounts')->cascadeOnDelete();
            $table->foreignId('campgian')->constrained('campgians')->cascadeOnDelete();
            $table->foreignId('clients_id')->constrained(table: 'clinets')->cascadeOnDelete();
            $table->foreignId(column: 'manag_id')->constrained('managments')->cascadeOnDelete();
            $table->foreignId('ads_id')->constrained('ads')->cascadeOnDelete();
            $table->foreignId('service_id')->constrained('services')->cascadeOnDelete();
            $table->foreignId('admins_id')->constrained('admins')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
