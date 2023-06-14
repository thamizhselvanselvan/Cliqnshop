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
        Schema::rename('cliqnshop_kycs', 'cns_kycs');
        Schema::rename('customer_contacts','cns_contacts');
        Schema::rename('home_page_contents','cns_home_page_contents');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('cns_kycs','cliqnshop_kycs');
        Schema::rename('cns_contacts','customer_contacts');
        Schema::rename('cns_home_page_contents','home_page_contents');
    }
};
