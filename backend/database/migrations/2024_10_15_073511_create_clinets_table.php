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
        Schema::create(table: 'clinets', callback: function (Blueprint $table) {
            $table->id();
            $table->string("client_name",50);
            $table->string('email',35);
            $table->string('adress',50);
            $table->string('phone',25);
            $table->float('taxes')->default(14);
            $table->float(column: 'curruancy')->default(10);
            $table->float(column: 'commission')->default(20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinets');
    }
};
