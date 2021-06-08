<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachercoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachercourses', function (Blueprint $table) {
            $table->id();
            $table->string('category_id')->nullable();
            $table->string('subcategory_id')->nullable();
            $table->string('childcategory_id')->nullable();
            $table->string('language')->nullable();
            $table->string('refund_policy')->nullable();
            $table->string('course_tag')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('short_details')->nullable();
            $table->string('requirements')->nullable();
            $table->string('details')->nullable();
            $table->string('pay_option')->nullable();
            $table->string('course_price')->nullable();
            $table->string('discount')->nullable();
            $table->string('upload_video')->nullable();
            $table->string('url')->nullable();
            $table->string('image')->nullable();
            $table->string('assignment_option')->nullable();
            $table->string('appointment_option')->nullable();
            $table->string('certificate_option')->nullable();
            $table->string('status')->nullable();
            $table->string('featured')->nullable();

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
        Schema::dropIfExists('teachercourses');
    }
}
