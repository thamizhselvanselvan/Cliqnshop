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
          Schema::create('mshop_order_confirmation', function (Blueprint $table) {
            $table->id();
            $table->string('recived_file',9999)->nullable();
            $table->string('payload')->nullable()->unique();
            $table->string('sent_payload')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('confirm_id')->nullable();
            $table->string('operation')->nullable();
            $table->string('shipment_type')->nullable();
            $table->string('notice_date')->nullable();
            $table->string('amount')->nullable();
            $table->string('tax')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('order_id')->nullable();
            $table->string('order_date')->nullable();
            $table->string('quantity')->nullable();
            $table->string('shipping_amount')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('mshop_order_conformation');
    }
};
