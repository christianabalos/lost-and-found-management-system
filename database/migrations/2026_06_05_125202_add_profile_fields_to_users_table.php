<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('first_name')->nullable()->after('id');
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();

            $table->string('student_id')->nullable()->unique();

            $table->string('contact_number')->nullable();

            $table->text('address')->nullable();

            $table->boolean('is_active')->default(true);

        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn([
                'first_name',
                'middle_name',
                'last_name',
                'student_id',
                'contact_number',
                'address',
                'is_active',
            ]);

        });
    }
};