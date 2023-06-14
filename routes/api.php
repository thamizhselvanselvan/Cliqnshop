<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::any("business_api_order_callback", function (Request $value) {

    $request = json_encode($_REQUEST);
    $rawdata = file_get_contents("php://input");
    $filename = rand(1, 1000) . ".txt";
    $folder_name = "order_confirmation";

    if ($value->input('source') == "ship_notification") {
        $folder_name = "ship_notification";
    }

    file_put_contents("$folder_name/$filename", $request . $rawdata);
});
