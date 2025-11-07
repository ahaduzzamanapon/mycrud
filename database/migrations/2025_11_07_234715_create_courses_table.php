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
        Schema::create('frontend_manager_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('frontend_manager_categories')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->string('title');
            $table->decimal('real_amount', 10, 2);
            $table->decimal('discount_amount', 10, 2)->nullable();
            $table->timestamp('offer_expire_date')->nullable();
            $table->string('course_duration');
            $table->integer('total_lecture');
            $table->integer('total_exam');
            $table->string('live_class');
            $table->json('course_includes');
            $table->text('description');
            $table->json('instructors');
            $table->text('routine')->nullable();
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
        Schema::dropIfExists('courses');
    }
};
