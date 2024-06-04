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
        Schema::create('exams', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('reviewer_id');
            $table->foreignUuid('question_id');
            $table->foreignUuid('question_item_id');
            $table->string('status', 64);
            $table->text('correct_answers');
            $table->text('wrong_answers');
            $table->boolean('graded');
            $table->double('score');        
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
