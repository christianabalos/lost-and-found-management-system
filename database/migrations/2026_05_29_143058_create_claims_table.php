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
        Schema::create('claims', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('item_id')
                ->constrained()
                ->onDelete('cascade');

            // Claim Verification Details
            $table->text('reason');
            $table->text('unique_identifier');
            $table->date('date_lost');
            $table->string('location_lost');

            // Optional proof upload
            $table->string('proof_image')->nullable();

            // Claim Status Workflow
            $table->enum('claim_status', [
                'pending',
                'under_review',
                'approved',
                'rejected',
                'claimed'
            ])->default('pending');

            // Admin review notes
            $table->text('admin_notes')->nullable();

            // Which admin reviewed the claim
            $table->foreignId('reviewed_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            // When claim was reviewed
            $table->timestamp('verified_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};