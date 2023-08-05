<?php

use App\Models\TestCase;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('test_case_data', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TestCase::class, 'test_case_id');
            $table->string('content');
            $table->text('kind')->default('Text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_case_data');
    }
};