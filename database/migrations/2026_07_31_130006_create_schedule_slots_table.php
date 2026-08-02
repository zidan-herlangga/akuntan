<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('schedule_slots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consultant_id')->constrained()->cascadeOnDelete();
            $table->dateTime('starts_at');
            $table->dateTime('ends_at');
            $table->string('status')->default('available');
            $table->foreignId('booking_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();

            $table->unique(['consultant_id', 'starts_at']);
            $table->index(['consultant_id', 'status']);
            $table->index('starts_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schedule_slots');
    }
};
