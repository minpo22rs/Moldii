<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbOtpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_otps', function (Blueprint $table) {
            $table->id();
            $table->integer('otp_customer_id');
            $table->string('otp_code');
            $table->string('otp_ref');
            $table->time('otp_verified', $precision = 2);
            $table->string('tel');
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
        Schema::dropIfExists('tb_otps');
    }
}
