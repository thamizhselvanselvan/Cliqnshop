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
        Schema::table('mshop_product', function (Blueprint $table) {
            $table->string('asin')->after('code');
            $table->unique( ['code','siteid','asin'], 'unq_mspro_siteid_code_asin_sid' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mshop_product', function (Blueprint $table) {
            $table->dropUnique('unq_mspro_siteid_code_asin_sid' );
            $table->dropColumn('asin');
        });
    }
};
