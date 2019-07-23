<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable
{
  public function up()
  {
    Schema::create('codepress_categories', function(Blueprint $table){
      $table->increments('id');
      $table->integer('parent_id')->nullable(true)->unsigned();
      $table->foreign('parent_id')->references('id')->on('codepress_categories');
      $table->string('name');
      $table->boolean('active')->default(false);
      $table->timestamps();
    });
  }
  
  public function down()
  {
    Schema::dropIfExists('codepress_categories');
  }
}