<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('lost_reports', function (Blueprint $table) {

            $table->dropForeign(['item_id']);

            $table->unsignedBigInteger('item_id')
                ->nullable()
                ->change();
        });
    }

    public function down(): void
    {
        Schema::table('lost_reports', function (Blueprint $table) {

            $table->unsignedBigInteger('item_id')
                ->nullable(false)
                ->change();

            $table->foreign('item_id')
                ->references('id')
                ->on('items')
                ->onDelete('cascade');
        });
    }
};