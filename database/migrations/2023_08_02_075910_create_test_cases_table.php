<?php

use App\Models\TestFile;
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
        Schema::create('test_cases', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TestFile::class, 'test_file_id');
            $table->foreignIdFor(TestFile::class, 'case_no');
            $table->foreignIdFor(User::class, 'created_by');
            $table->string('title');
            $table->string('description');
            $table->string('expected_result');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('test_cases');
    }
};