<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CatEnable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Mosh:CatEnable';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enable All Categories who have alleast one product';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $cat = DB::table('mshop_catalog')
        ->rightJoin('mshop_product_list', 'mshop_catalog.id' , '=', 'mshop_product_list.refid')
        ->where('domain', 'catalog')
        ->distinct()
        ->pluck('refid')
        ->toArray();
            DB::table('mshop_catalog')
            ->whereIn('id',$cat)
            ->update(['status' => 1]
        );
        return Command::SUCCESS;
    }
}
