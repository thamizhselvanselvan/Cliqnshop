<?php

namespace Aimeos\MShop\Service\Provider\Payment;

use Razorpay\Api\Api;
use Session;
use Exception;


class Razorpay
extends \Aimeos\MShop\Service\Provider\Payment\Base
implements \Aimeos\MShop\Service\Provider\Payment\Iface
{
    /**
     * Tries to get an authorization or captures the money immediately for the given
     * order if capturing isn't supported or not configured by the shop owner.
     *
     * @param \Aimeos\MShop\Order\Item\Iface $order Order invoice object
     * @param array $params Request parameter if available
     * @return \Aimeos\MShop\Common\Helper\Form\Standard Form object with URL, action
     *  and parameters to redirect to    (e.g. to an external server of the payment
     *  provider or to a local success page)
     */
    public function process(
        \Aimeos\MShop\Order\Item\Iface $order,
        array $params = []
    ): ?\Aimeos\MShop\Common\Helper\Form\Iface {


        $basket = $this->getOrderBase($order->getBaseId());

        $total = $basket->getPrice()->getValue() + $basket->getPrice()->getCosts();
        //  dd($total);
        $orderdata = [
            'receipt'         => 'receipt_' . $basket["order.base.id"],
            'amount'          => $basket["order.base.price"] * 100,
            'currency'        => $basket["order.base.currencyid"]
        ];
        $api = new Api(config('services.razorpay.RAZORPAY_KEY'),config('services.razorpay.RAZORPAY_SECRET'));
        // $razorpayOrder = $api->order->create($orderData);
        // dd($razorpayOrder);
        $url = $this->getConfigValue('payment.url-success');

        // $razorpayOrder = $api->paymentLink->create(array('amount'=> $basket["order.base.price"]*100, 'currency'=>$basket["order.base.currencyid"], 'accept_partial'=>false,
        // 'customer' => array('name'=>'',
        //  'contact'=>''),  'notify'=>array('sms'=>false, 'email'=>false) ,
        // 'reminder_enable'=>false ,'callback_url' => $url,
        // 'callback_method'=>'get'));

        $razorpayOrder = $api->paymentLink->create(array(
            'amount' => $basket["order.base.price"] * 100, 'currency' => $basket["order.base.currencyid"], 'accept_partial' => false, 'notify' => array('sms' => false, 'email' => false), 'reminder_enable' => false, 'callback_url' => $url,
            'callback_method' => 'get', 'options' => array('checkout' => array('name' => 'Cliqnshop'))
        ));

        // dd($razorpayOrder);
        //($razorpayOrder->short_url);




        // $razorpayOrder = $api->order->create(array('receipt' => 'receipt_'.$basket["order.base.id"], 'amount' => $basket["order.base.price"]*100, 'currency' => $basket["order.base.currencyid"]));
        // $attributes  = array('razorpay_signature'  => '',  'razorpay_payment_id'  => '' ,  'razorpay_order_id' => $razorpayOrder->id);
        //($attributes);
        //dd($razorpayOrder);
        //dd($razorpayOrder);
        // dd($razorpayOrder->id);

        $list = [
            'myprovider.orderid' => new \Aimeos\Base\Criteria\Attribute\Standard([
                'label' => 'Order ID',
                'code' => 'myprovider.orderid',
                'internalcode' => 'x_ref',
                'internaltype' => 'string',
                'type' => 'string',
                'default' => $order->getId(),
                'amount' => $basket["order.base.price"] * 100,
                'currency' => $basket["order.base.currencyid"],
                'order_id' => $razorpayOrder->id,
                'status' => $razorpayOrder->status,
                'callback_url' => $url,
                'public' => false,
            ]),
            'myprovider.total' => new \Aimeos\Base\Criteria\Attribute\Standard([
                'label' => 'Total value',
                'code' => 'myprovider.total',
                'internalcode' => 'x_total',
                'internaltype' => 'float',
                'type' => 'float',
                'default' => $total,
                'public' => false,
            ]),
        ];

        // "prefill" => [
        //     "name" => $basket["order.base.editor"],
        //     "email"  => $basket["order.base.editor"],
        //     "contact" => "9999999999",
        // ],
        // "notes"=> [
        //     "address" => "Razorpay Corporate Office"
        // ],

        //     //  ($list);

        //     $gatewayUrl = $this->getConfigValue( 'myprovider.url', 'https://checkout.razorpay.com/checkout' );

        //     return new \Aimeos\MShop\Common\Helper\Form\Standard( $gatewayUrl, 'POST', $list );


        // $attributes  = array('razorpay_signature'  => '23233',  'razorpay_payment_id'  => '332' ,  'razorpay_order_id' => '12122');
        // $order  = $api->utility->verifyPaymentSignature($attributes);
        // return \View::make('vendor.shop.checkout',$order, $params);
        // return View::make('checkout');

        $gatewayUrl = $this->getConfigValue('myprovider.url', $razorpayOrder->short_url);
        return new \Aimeos\MShop\Common\Helper\Form\Standard($gatewayUrl, 'GET', $list);
    }
    public function updateSync(
        \Psr\Http\Message\ServerRequestInterface $request,
        \Aimeos\MShop\Order\Item\Iface $order
    ): \Aimeos\MShop\Order\Item\Iface {
        // extract status from the request
        // map the status value to one of the Aimeos payment status values
        
         $status = \Aimeos\MShop\Order\Item\Base::PAY_RECEIVED;
            $order->setStatusPayment( $status );
        $this->saveOrder($order);
        return $order;
    }
}
