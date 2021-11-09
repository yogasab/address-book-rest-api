<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactLabelsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('contact_labels', function (Blueprint $table) {
      $table->id();
      $table->integer('contact_id');
      $table->foreign('contact_id')->on('contacts')->references('id')->onDelete('cascade');
      $table->integer('label_id');
      $table->foreign('label_id')->on('labels')->references('id')->onDelete('cascade');
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
    Schema::dropIfExists('contact_labels');
  }
}
