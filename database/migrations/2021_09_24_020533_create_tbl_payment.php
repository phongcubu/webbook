<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_payment', function (Blueprint $table) {
            $table->increments('payment_id');
            $table->integer('shipping_id');
            $table->integer('customer_id');
            $table->float('payment_money')->comment('số tiền cần thanh toán');
            $table->string('payment_note')->comment('ghi chú  thanh toán');
            $table->string('payment_vnp_response_code')->comment('mã phản hồi');
            $table->string('payment_code_vnpay')->comment('mã giao dịch vnpay');
            $table->string('payment_code_bank')->comment('mã ngân hàng');
            $table->datetime('payment_time')->comment('thời gian chuyển khoản');
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
        Schema::dropIfExists('tbl_payment');
    }
}
