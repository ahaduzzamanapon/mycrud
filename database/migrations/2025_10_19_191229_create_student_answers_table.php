<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_id')->constrained()->onDelete('cascade');
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('question_id')->constrained()->onDelete('cascade');
            $table->foreignId('option_id')->nullable()->constrained()->onDelete('cascade'); // For single choice
            $table->json('option_ids')->nullable(); // For multiple choice
            $table->boolean('is_correct')->default(false);
            $table->decimal('marks_obtained', 5, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_answers', function (Blueprint $table) {
            $table->dropForeign(['exam_id']);
            $table->dropForeign(['student_id']);
            $table->dropForeign(['question_id']);
            $table->dropForeign(['option_id']);
        });
        Schema::dropIfExists('student_answers');
    }
};
