<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_number')->unique();
            $table->foreignId('consultant_id')->constrained()->cascadeOnDelete();
            $table->foreignId('service_id')->nullable()->constrained()->nullOnDelete();
            $table->string('client_name');
            $table->string('client_email');
            $table->string('client_phone');
            $table->string('company_name')->nullable();
            $table->text('company_npwp')->nullable();
            $table->text('financial_issue_description')->nullable();
            $table->string('meeting_link')->nullable();
            $table->string('status')->default('pending');
            $table->string('source')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('notes')->nullable();
            $table->dateTime('starts_at');
            $table->dateTime('ends_at');
            $table->timestamps();

            $table->index(['status']);
            $table->index(['consultant_id', 'starts_at']);
            $table->index(['client_email']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
