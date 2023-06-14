<?php

namespace App\Console\Commands\callback;

use Log;
use File;
use SimpleXMLElement;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Notifications\SlackNotification;
use Illuminate\Support\Facades\Notification;


class ship_notificaton_callback_save extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'mosh:ship_notification_callback_save';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Saves all the ShipNotification callback to database';

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {

    $files = File::allFiles('public/ship_notification');
    $string = '{"source":"ship_notification"}';

    foreach ($files as $key => $file) {
      $str =  file_get_contents($file);

      $data = str_replace($string, '', $str);

      if ($data == '') {
        Log::alert("No data found in ship_notification callback file");
        File::delete($file);
        continue;
      } else if ($data[0] != '<') {
        Log::notice("Failed to parse(ship_notification) XML file (No XML data)");
          File::delete($file);
        continue;
      } else {

        $parse = simplexml_load_string($data);
        $xmlr =  json_decode(json_encode($parse), true);
        $payloadID = $xmlr['@attributes']['payloadID'];
        $shipment_id = $xmlr['Request']['ShipNoticeRequest']['ShipNoticeHeader']['@attributes']['shipmentID'];
        $operation = $xmlr['Request']['ShipNoticeRequest']['ShipNoticeHeader']['@attributes']['operation'];
        $noticeDate = $xmlr['Request']['ShipNoticeRequest']['ShipNoticeHeader']['@attributes']['noticeDate'];
        $shipmentDate = $xmlr['Request']['ShipNoticeRequest']['ShipNoticeHeader']['@attributes']['shipmentDate'];
        $deliveryDate = $xmlr['Request']['ShipNoticeRequest']['ShipNoticeHeader']['@attributes']['deliveryDate'];
        $shipmentType = $xmlr['Request']['ShipNoticeRequest']['ShipNoticeHeader']['@attributes']['shipmentType'];
        $order_date = $xmlr['Request']['ShipNoticeRequest']['ShipNoticePortion']['OrderReference']['@attributes']['orderDate'];
        $orderID = $xmlr['Request']['ShipNoticeRequest']['ShipNoticePortion']['OrderReference']['@attributes']['orderID'];
        $sent_payload = $xmlr['Request']['ShipNoticeRequest']['ShipNoticePortion']['OrderReference']['DocumentReference']['@attributes']['payloadID'];
        $user_agent = $xmlr['Header']['Sender']['UserAgent'];
        $status = 'shipped';
        $insert = [
          'recived_file' => json_encode($xmlr),
          'payload' => $payloadID,
          'sent_payload' =>  $sent_payload,
          'user_agent' => $user_agent,
          'shipment_id' => $shipment_id,
          'operation' => $operation,
          'shipment_type' => $shipmentType,
          'notice_date' => $noticeDate,
          'shipment_date' =>  $shipmentDate,
          'delivery_date' => $deliveryDate,
          'order_id' => $orderID,
          'order_date' => $order_date,
          'status' => $status,
          'created_at' => now(),
          'updated_at' => now()
        ];

        DB::table('mshop_ship_notification')->upsert($insert, ['payload'], [

          'recived_file',
          'payload',
          'sent_payload',
          'user_agent',
          'shipment_id',
          'operation',
          'shipment_type',
          'notice_date',
          'shipment_date',
          'delivery_date',
          'order_id',
          'order_date',
          'status',
          'updated_at'
        ]);
      }
      $this->keycheck($xmlr);
      File::delete($file);
    }
   
  }
  public function keycheck($xmlr)
  {

    $notification_header = count($xmlr['Request']['ShipNoticeRequest']['ShipNoticeHeader']); //1
    $notification_header_data = count($xmlr['Request']['ShipNoticeRequest']['ShipNoticeHeader']['@attributes']); //6
    $check = (($xmlr["@attributes"]));
    $message = 'ok';
    if (count($check) > 2) {
      $message = 'Extra Xml Data Receved In Ship notification Callback XML file';
    } else if ($notification_header > 1) {
      $message = "Receved Extra Notification header In Ship notification Callback XML file";
    } else if ($notification_header_data > 6) {
      $message = "Receved Extra Notification Header Data In Ship Notification Callback XML file";
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
