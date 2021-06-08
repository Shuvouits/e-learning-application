<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherchildcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacherchildcategories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('category_name')->nullable();
            $table->string('category_id')->nullable();
            $table->string('subcategory_name')->nullable();
            $table->string('subcategory_id')->nullable();
            $table->string('icon')->nullable();
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
        Schema::dropIfExists('teacherchildcategories');
    }
}
