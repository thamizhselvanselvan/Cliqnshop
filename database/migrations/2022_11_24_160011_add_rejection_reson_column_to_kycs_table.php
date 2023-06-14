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
        Schema::table('cliqnshop_kycs', function (Blueprint $table) {
            $table->string('rejection_reason')->after('kyc_status')->nullable();
            $table->timestamp('kyc_aproved_date')->after('rejection_reason')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cliqnshop_kycs', function (Blueprint $table) {
            $table->dropColumn('rejection_reason');
            $table->dropColumn('kyc_aproved_date');
        });
    }
};
