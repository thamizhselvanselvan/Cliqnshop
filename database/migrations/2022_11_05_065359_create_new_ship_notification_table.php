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
        Schema::create('mshop_ship_notification', function (Blueprint $table) {
            $table->id();
            $table->string('recived_file',9999)->nullable();
            $table->string('payload')->nullable()->unique();
            $table->string('sent_payload')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('shipment_id')->nullable();
            $table->string('operation')->nullable();
            $table->string('shipment_type')->nullable();
            $table->string('notice_date')->nullable();
            $table->string('shipment_date')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('order_id')->nullable();
            $table->string('order_date')->nullable();
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
        Schema::dropIfExists('mshop_ship_notification');
    }
};
