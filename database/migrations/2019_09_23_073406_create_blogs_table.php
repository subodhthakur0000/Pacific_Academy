<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->mediumtext('summary');
            $table->longtext('description');
            $table->string('name');
            $table->mediumtext('image')->nullable();
            $table->mediumtext('imagedescription');
            $table->string('seotitle');
            $table->string('seokeyword');
            $table->longtext('seodescription');
            $table->string('status');
            $table->string('slug')->default()->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
