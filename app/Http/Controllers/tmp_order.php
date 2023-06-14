<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class tmp_order extends Controller
{
    public function index() {
        $orders = DB::select('select * from mshop_order_base_product order by `baseid` desc');
        return view('tmp_order',['orders'=>$orders]);
     }

   public function xml($id) {

    $orders = DB::select("SELECT sent_xml from mshop_order_base_product where id = $id");
  
    return view('xml', compact('orders'));
     }
   }

