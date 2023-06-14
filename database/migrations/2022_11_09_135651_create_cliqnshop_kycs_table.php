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
        Schema::create('cliqnshop_kycs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->string('document_type');
            $table->string('file_path_front');
            $table->string('file_path_back');
            $table->string('kyc_status')->nullable();
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
        Schema::dropIfExists('cliqnshop_kycs');
    }
};
