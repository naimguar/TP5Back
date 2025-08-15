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
    Schema::create('appointments', function (Blueprint $table) {
        $table->id();
        $table->foreignId('client_id')->constrained()->onDelete('cascade'); // La relación
        $table->dateTime('appointment_date');
        $table->text('reason')->nullable();
        $table->string('status')->default('Confirmado'); // ej: Confirmado, Cancelado
        $table->timestamps();
        $table->softDeletes();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
