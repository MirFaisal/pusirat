<?php

use App\Models\TestCase;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('test_case_remarks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TestCase::class, 'test_case_id');
            $table->foreignIdFor(User::class, 'created_by');
            $table->text('remark');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_case_remarks');
    }
};