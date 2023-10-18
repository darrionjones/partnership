<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('partners', function (Blueprint $table) {
      $table->id();
      $table->string('business_name')->unique();
      $table->string('email')->unique();
      $table->string('phone_number')->unique();
      $table->string('city');
      $table->string('location');
      $table->string('business_type');
      $table->string('num_of_staff')->nullable();
      $table->string('tin_num')->nullable();
      $table->string('biz_reg_num')->nullable();
      $table->string('bank_name')->nullable();
      $table->string('bank_branch')->nullable();
      $table->string('bank_number')->nullable();
      $table->string('billing_address')->nullable();
      $table->string('bank_account_name')->nullable();
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
    Schema::dropIfExists('partners');
  }
}
