<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('item_matches', function (Blueprint $table) {

            $table->id();

            $table->foreignId('lost_report_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('found_report_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->integer('match_score')->default(0);

            $table->enum('status', [
                'pending',
                'approved',
                'rejected'
            ])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('item_matches');
    }
};