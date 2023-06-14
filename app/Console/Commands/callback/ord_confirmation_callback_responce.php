<?php

namespace App\Console\Commands\callback;

use Log;
use File;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Notifications\SlackNotification;
use Illuminate\Support\Facades\Notification;


class ord_confirmation_callback_responce extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'mosh:order_confirmation_callback_save';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'saves All order confirmation callback repsonces to  table';

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {

    $files = File::allFiles('public/order_confirmation');
    $string = '{"source":"order_confirmation"}';

    foreach ($files as $key => $file) {
     
      $str =  file_get_contents($file);
      $data = str_replace($string, '', $str);

      if ($data == '') {
        Log::alert("No data found in order_confirmation callback file");
        File::delete($file);
        continue;
      } else if ($data[0] != '<') {
        Log::notice("Failed to parse(order_confirmation) XML file (No XML data)");
        File::delete($file);
        continue;
      } else {

        $parse = simplexml_load_string($data);
        $xmlr =  json_decode(json_encode($parse), true);
        $fail_message = "This item became unavailable after you placed your order and we couldn't find a good replacement. Talk to your admin or try ordering it again.";

        if ($fail_message == $xmlr['Request']['ConfirmationRequest']['ConfirmationItem']['ConfirmationStatus']['Comments']) {
          $payloadID = $xmlr['@attributes']['payloadID'];
          $sent_payloadID = $xmlr['Request']['ConfirmationRequest']['OrderReference']['DocumentReference']['@attributes']['payloadID'];
          $user_agent = $xmlr['Header']['Sender']['UserAgent'];
          $confirm_id = null;
          $operation = $xmlr['Request']['ConfirmationRequest']['ConfirmationHeader']['@attributes']['operation'];
          $type = $xmlr['Request']['ConfirmationRequest']['ConfirmationHeader']['@attributes']['type'];
          $noticeDate = $xmlr['Request']['ConfirmationRequest']['ConfirmationHeader']['@attributes']['noticeDate'];
          $totalamount = null;
          $tax = null;
          $shipping_amont = null;
          $order_id = $xmlr['Request']['ConfirmationRequest']['OrderReference']['@attributes']['orderID'];
          $order_date = $xmlr['Request']['ConfirmationRequest']['OrderReference']['@attributes']['orderDate'];
          $order_qty = $xmlr['Request']['ConfirmationRequest']['ConfirmationItem']['@attributes']['quantity'];
          $base_amt = null;
          $status = 'booking Failed';
        } else {

          $payloadID = $xmlr['@attributes']['payloadID'];
          $sent_payloadID = $xmlr['Request']['ConfirmationRequest']['OrderReference']['DocumentReference']['@attributes']['payloadID'];
          $user_agent = $xmlr['Header']['Sender']['UserAgent'];
          $confirm_id = $xmlr['Request']['ConfirmationRequest']['ConfirmationHeader']['@attributes']['confirmID'];
          $operation = $xmlr['Request']['ConfirmationRequest']['ConfirmationHeader']['@attributes']['operation'];
          $type = $xmlr['Request']['ConfirmationRequest']['ConfirmationHeader']['@attributes']['type'];
          $noticeDate = $xmlr['Request']['ConfirmationRequest']['ConfirmationHeader']['@attributes']['noticeDate'];
          $totalamount = $xmlr['Request']['ConfirmationRequest']['ConfirmationHeader']['Total']['Money'];
          $tax = $xmlr['Request']['ConfirmationRequest']['ConfirmationHeader']['Tax']['Money'];
          $shipping_amont = $xmlr['Request']['ConfirmationRequest']['ConfirmationHeader']['Shipping']['Money'];
          $order_id = $xmlr['Request']['ConfirmationRequest']['OrderReference']['@attributes']['orderID'];
          $order_date = $xmlr['Request']['ConfirmationRequest']['OrderReference']['@attributes']['orderDate'];
          $order_qty = $xmlr['Request']['ConfirmationRequest']['ConfirmationItem']['@attributes']['quantity'];
          $base_amt = $xmlr['Request']['ConfirmationRequest']['ConfirmationItem']['ConfirmationStatus']['UnitPrice']['Money'];
          $status = 'booking Success';
        }
      }

      $insert = [
        'recived_file' => json_encode($xmlr),
        'payload' => $payloadID,
        'sent_payload' => $sent_payloadID,
        'user_agent' => $user_agent,
        'confirm_id' => $confirm_id,
        'operation' => $operation,
        'shipment_type' => $type,
        'notice_date' => $noticeDate,
        'amount' => $base_amt,
        'tax' => $tax,
        'total_amount' => $totalamount,
        'order_id' => $order_id,
        'order_date' => $order_date,
        'quantity' => $order_qty,
        'shipping_amount' => $shipping_amont,
        'status' => $status,
        'created_at' => now(),
        'updated_at' => now()
      ];
      DB::table('mshop_order_confirmation')->upsert($insert, ['payload'], [

        'recived_file',
        'sent_payload',
        'user_agent',
        'confirm_id',
        'operation',
        'shipment_type',
        'notice_date',
        'amount',
        'tax',
        'total_amount',
        'order_id',
        'order_date',
        'quantity',
        'shipping_amount',
        'status',
      ]);

      $this->order_chk($xmlr);
     File::delete($file);
    }
  }
  public function order_chk($xmlr)
  {

    $check = count(($xmlr["@attributes"]));
    $confirm_head = count($xmlr['Request']['ConfirmationRequest']['ConfirmationHeader']); //4
    $confirm_fields = count($xmlr['Request']['ConfirmationRequest']); //3
    $confirm_item = count($xmlr['Request']['ConfirmationRequest']['ConfirmationItem']); //3

    $message = 'ok';
    if ($check > 2) {
      $message = 'Extra Xml Data Receved In order Confirmation Callback XML file';
    } else if ($confirm_head > 4) {
      $message = "Receved Extra Confirmation header In order Confirmation Callback XML file";
    } else if ($confirm_fields > 3) {
      $message = "Receved Extra Confirmation fields Header Data In order Confirmation Callback XML file";
    } else if ($confirm_item > 3) {
      $message = "Receved Extra Confirmation item Data In order Confirmation Callback XML file";
    } else {
      $message = 'ok';
    }

    if($message != 'ok'){
      Log::info($message);
      $test =new SlackNotification($message);
      $test->toslack();
     Notification::route('slack', config('app.slack_notification_webhook'))
    ->notify(new SlackNotification("$message"));

    } 
  }
}
