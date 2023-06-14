<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Aimeos\Shop\Facades\Shop;
use App\Models\cliqnshop_kyc;
use App\Models\FooterContent;
use App\Models\CustomerContact;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class MyController extends Controller
{

    public function  getStaticPageContent( $page) :string
    {
        $context = app('aimeos.context')->get();
        $locale = $context->locale();
        $sitecode=($locale)->getSiteItem()->getCode();       
        $content = FooterContent::where('site_name', $sitecode)->where('content_name', $page)->pluck('content')->ToArray();        
        !empty($content)?$content=$content[0]:$content='';
        return  $content;        
    }

    public function contactAction()
    {
         $context = app('aimeos.context')->get();
         $locale = $context->locale();
         $site=($locale)->getSiteItem()->getCode();

         $params = ['page' => 'contact-index'];
            foreach (app('config')->get('shop.page.contact-index', ['catalog/tree', 'basket/mini']) as $name) {
                $params['aiheader'][$name] = Shop::get($name)->header();
                $params['aibody'][$name] = Shop::get($name)->body();
            }
       
            $params['address_info'] =   $this->getStaticPageContent('shop_address');
            $params['phone_info'] =   $this->getStaticPageContent('Call Us');
            $params['mail_info'] =   $this->getStaticPageContent('Email for Us');
            $params['google_map_src'] =   $this->getStaticPageContent('google_map_src');
            
           

            return Response::view(Shop::template('page.contact'), $params)
                ->header('Cache-Control', '');


    }

    public function contact_store(Request $request)
    {

        $request->validate([

            'name' => 'required|max:20|min:5',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $context = app('aimeos.context')->get();
        $config = $context->config();

        $name = $request->get('name');
        $email = $request->get('email');
        $subject = $request->get('subject');
        $message = $request->get('message');

         $locale = $context->locale();
         $site=($locale)->getSiteItem()->getCode();

        CustomerContact::create([
            'name' => $name,
            'email' => $email,
            'site_name' => $site,
            'subject' => $subject,
            'message' => $message,
        ]);

        return back()->with('success', 'Thank you for your message , we will get back to you soon');

    }

    public function faqAction()
    {

        $params = ['page' => 'faq-index'];
        foreach (app('config')->get('shop.page.faq-index', ['catalog/tree', 'basket/mini']) as $name) {
            $params['aiheader'][$name] = Shop::get($name)->header();
            $params['aibody'][$name] = Shop::get($name)->body();
        }

        return Response::view(Shop::template('page.faq'), $params)
            ->header('Cache-Control', '');

    }

    public function termsAction()
    {

        $params = ['page' => 'terms-index'];
        foreach (app('config')->get('shop.page.terms-index', ['catalog/tree', 'basket/mini']) as $name) {
            $params['aiheader'][$name] = Shop::get($name)->header();
            $params['aibody'][$name] = Shop::get($name)->body();
        }

        $params['content']= $this->getStaticPageContent('terms_and_conditions');

        return Response::view(Shop::template('page.terms'), $params)
            ->header('Cache-Control', '');

    }

    public function privacyAction()
    {

        $params = ['page' => 'privacy-index'];
        foreach (app('config')->get('shop.page.privacy-index', ['catalog/tree', 'basket/mini']) as $name) {
            $params['aiheader'][$name] = Shop::get($name)->header();
            $params['aibody'][$name] = Shop::get($name)->body();
        }

        $params['content'] =   $this->getStaticPageContent('privacy_policy');

        return Response::view(Shop::template('page.privacy'), $params)
            ->header('Cache-Control', '');

    }

    public function returnRefundAction()
    {

        $params = ['page' => 'return-index'];
        foreach (app('config')->get('shop.page.return-index', ['catalog/tree', 'basket/mini']) as $name) {
            $params['aiheader'][$name] = Shop::get($name)->header();
            $params['aibody'][$name] = Shop::get($name)->body();
        }

        $params['content'] =   $this->getStaticPageContent('return _and_refund_policy');

        return Response::view(Shop::template('page.return-policy'), $params)
            ->header('Cache-Control', '');

    }

    public function kyc_index()
    {
        $context = app('aimeos.context')->get();
       // dd($context);
        $context = app('aimeos.context')->get();
        $locale = $context->locale();
        // dd($locale);
        $site=($locale)->getSiteItem()->getCode();
        // dd($site);
        if($site!="in")
        {
            $params = ['page' => 'page-account-index'];
            foreach (app('config')->get('shop.page.account-index') as $name) {

                $params['aiheader'][$name] = Shop::get($name)->header();
                $params['aibody'][$name] = Shop::get($name)->body();
            }
            return Response::view(Shop::template('account.no_kyc'), $params)
                ->header('Cache-Control', 'no-store, max-age=0');
        }
        $config = $context->config();
        $domains = $config->get('client/html/account/profile/domains', ['customer/address']);
        $item = \Aimeos\Controller\Frontend::create($context, 'customer')->uses($domains)->get();
        $addr = $item->getPaymentAddress();
        $array = $addr->toArray();
        $id = $array['customer.id'];
        $customer_ids = cliqnshop_kyc::where('customer_id', $id)->get();
        foreach ($customer_ids as $customer_id) {$kyc_status = $customer_id->kyc_status;
            $rejection_reason = $customer_id->rejection_reason;
            $kyc_aproved_date = $customer_id->kyc_aproved_date;
        }
        if (!isset($kyc_status)) {
            $params = ['page' => 'page-account-index'];
            foreach (app('config')->get('shop.page.account-index') as $name) {

                $params['aiheader'][$name] = Shop::get($name)->header();
                $params['aibody'][$name] = Shop::get($name)->body();
            }
            return Response::view(Shop::template('account.kyc'), $params)
                ->header('Cache-Control', 'no-store, max-age=0');
        } else if ($kyc_status == 2) {
            $params = ['page' => 'page-account-index'];
            foreach (app('config')->get('shop.page.account-index') as $name) {

                $params['aiheader'][$name] = Shop::get($name)->header();
                $params['aibody'][$name] = Shop::get($name)->body();
            }
            return Response::view(Shop::template('account.kyc'), $params)
                ->header('Cache-Control', 'no-store, max-age=0');
        } else if ($kyc_status == 1) {
            $params = ['page' => 'page-account-index'];
            foreach (app('config')->get('shop.page.account-index') as $name) {

                $params['aiheader'][$name] = Shop::get($name)->header();
                $params['aibody'][$name] = Shop::get($name)->body();
            }
            return Response::view(Shop::template('account.kyc_approved'), $params)
                ->header('Cache-Control', 'no-store, max-age=0');
        } else {
            $params = ['page' => 'page-account-index'];
            foreach (app('config')->get('shop.page.account-index') as $name) {

                $params['aiheader'][$name] = Shop::get($name)->header();
                $params['aibody'][$name] = Shop::get($name)->body();
            }
            return Response::view(Shop::template('account.kyc'), $params)
                ->header('Cache-Control', 'no-store, max-age=0');
        }
    }

    public function kyc_store(Request $request)
    {
        $context = app('aimeos.context')->get();
        $config = $context->config();
        $domains = $config->get('client/html/account/profile/domains', ['customer/address']);
        $item = \Aimeos\Controller\Frontend::create($context, 'customer')->uses($domains)->get();
        $addr = $item->getPaymentAddress();
        $array = $addr->toArray();
        $id = $array['customer.id'];
        $date_time = Carbon::now()->isoformat('DMYYHHmmss');
        $year = Carbon::now()->isoformat('YYYY');
        $month = Carbon::now()->isoformat('MMMM');
        $request->validate([

            'document' => 'required',
            'front' => 'required|max:600|mimes:jpeg,png,jpg',
            'back' => 'required|max:600|mimes:jpeg,png,jpg',
        ]);

        $file_type = $request->get('document');
        if (!$request->hasFile('front')) {
            return back()->with('error', "Please upload $file_type front side image");
        }
        if (!$request->hasFile('back')) {
            return back()->with('error', "Please upload $file_type back side image");
        }
        if (app()->environment() === 'staging') {
            $file_path_front = "staging/KYC_$year/$month/$file_type$id${date_time}_front.jpg";
            $file_path_back = "staging/KYC_$year/$month/$file_type$id${date_time}_back.jpg";
            $front = file_get_contents($request->front);
            $back = file_get_contents($request->back);
            $customer_ids = cliqnshop_kyc::where('customer_id', $id)->get();
            foreach ($customer_ids as $customer_id) {
                $kyc_status = $customer_id->kyc_status;
                $rejection_reason = $customer_id->rejection_reason;
                $reject_date = $customer_id->kyc_aproved_date;
            }
            if (count($customer_ids) > 0) {
                if (!$kyc_status == 2) {
                    return back()->with('error', 'You already uploaded your documents! Please wait for Approval');
                }
                if ($kyc_status == 1) {
                    return back();
                }
            }
            if (!isset($kyc_status)) {
                Storage::disk('do')->put($file_path_front, $front);
                Storage::disk('do')->put($file_path_back, $back);
                cliqnshop_kyc::create([
                    'customer_id' => $id,
                    'document_type' => $file_type,
                    'file_path_front' => $file_path_front,
                    'file_path_back' => $file_path_back,
                ]);
                return back()->with('success', $file_type . ' Has Been Uploaded Successfully! Please wait for Approval');
            }
            if ($kyc_status == 2) {
                Storage::disk('do')->put($file_path_front, $front);
                Storage::disk('do')->put($file_path_back, $back);
                cliqnshop_kyc::where('customer_id', $id)->update([
                    'document_type' => $file_type,
                    'file_path_front' => $file_path_front,
                    'file_path_back' => $file_path_back,
                    'kyc_status' => null,
                    'rejection_reason' => null,
                    'kyc_aproved_date' => null,
                ]);
                return back()->with('success', "Last Time Your KYC Had Been Rejected Due to $rejection_reason On $reject_date Now Your $file_type Has Been Uploaded Successfully! Please wait for Approval");
            }
        }
        if (app()->environment() === 'production') {
            $file_path_front = "production/KYC_$year/$month/$file_type$id${date_time}_front.jpg";
            $file_path_back = "production/KYC_$year/$month/$file_type$id${date_time}_back.jpg";
            $front = file_get_contents($request->front);
            $back = file_get_contents($request->back);
            $customer_ids = cliqnshop_kyc::where('customer_id', $id)->get();
            foreach ($customer_ids as $customer_id) {
                $kyc_status = $customer_id->kyc_status;
                $rejection_reason = $customer_id->rejection_reason;
                $reject_date = $customer_id->kyc_aproved_date;
            }
            if (count($customer_ids) > 0) {
                if (!$kyc_status == 2) {
                    return back()->with('error', 'You already uploaded your documents! Please wait for Approval');
                }
                if ($kyc_status == 1) {
                    return back();
                }
            }
            if (!isset($kyc_status)) {
                Storage::disk('do')->put($file_path_front, $front);
                Storage::disk('do')->put($file_path_back, $back);
                cliqnshop_kyc::create([
                    'customer_id' => $id,
                    'document_type' => $file_type,
                    'file_path_front' => $file_path_front,
                    'file_path_back' => $file_path_back,
                ]);
                return back()->with('success', $file_type . ' Has Been Uploaded Successfully! Please wait for Approval');
            }
            if ($kyc_status == 2) {
                Storage::disk('do')->put($file_path_front, $front);
                Storage::disk('do')->put($file_path_back, $back);
                cliqnshop_kyc::where('customer_id', $id)->update([
                    'document_type' => $file_type,
                    'file_path_front' => $file_path_front,
                    'file_path_back' => $file_path_back,
                    'kyc_status' => null,
                    'rejection_reason' => null,
                    'kyc_aproved_date' => null,
                ]);
                return back()->with('success', "Last Time Your KYC Had Been Rejected Due to $rejection_reason On $reject_date Now Your $file_type Has Been Uploaded Successfully! Please wait for Approval");
            }
        }
        if (app()->environment() === 'local') {
            $file_path_front = "KYC_$year/$month/$file_type$id${date_time}_front.jpg";
            $file_path_back = "KYC_$year/$month/$file_type$id${date_time}_back.jpg";
            $front = file_get_contents($request->front);
            $back = file_get_contents($request->back);
            $customer_ids = cliqnshop_kyc::where('customer_id', $id)->get();
            foreach ($customer_ids as $customer_id) {
                $kyc_status = $customer_id->kyc_status;
                $rejection_reason = $customer_id->rejection_reason;
                $reject_date = $customer_id->kyc_aproved_date;
            }
            if (count($customer_ids) > 0) {
                if (!$kyc_status == 2) {
                    return back()->with('error', 'You already uploaded your documents! Please wait for Approval');
                }
                if ($kyc_status == 1) {
                    return back();
                }
            }
            if (!isset($kyc_status)) {
                Storage::put($file_path_back, $back);
                Storage::put($file_path_front, $front);
                cliqnshop_kyc::create([
                    'customer_id' => $id,
                    'document_type' => $file_type,
                    'file_path_front' => $file_path_front,
                    'file_path_back' => $file_path_back,
                ]);
                return back()->with('success', $file_type . ' Has Been Uploaded Successfully! Please wait for Approval');
            }
            if ($kyc_status == 2) {
                Storage::put($file_path_back, $back);
                Storage::put($file_path_front, $front);
                cliqnshop_kyc::where('customer_id', $id)->update([
                    'document_type' => $file_type,
                    'file_path_front' => $file_path_front,
                    'file_path_back' => $file_path_back,
                    'kyc_status' => null,
                    'rejection_reason' => null,
                    'kyc_aproved_date' => null,
                ]);
                return back()->with('success', "Last Time Your KYC Had Been Rejected Due to $rejection_reason On $reject_date Now Your $file_type Has Been Uploaded Successfully! Please wait for Approval");
            }
        }
    }

    public function review_index()
    {
        $params = ['page' => 'page-account-index'];
        foreach (app('config')->get('shop.page.account-index') as $name) {

            $params['aiheader'][$name] = Shop::get($name)->header();
            $params['aibody'][$name] = Shop::get($name)->body();
        }

        return Response::view(Shop::template('account.orders'), $params)
            ->header('Cache-Control', 'no-store, max-age=0');
    }

    public function address_index()
    {
        $params = ['page' => 'page-account-index'];
        foreach (app('config')->get('shop.page.account-index') as $name) {

            $params['aiheader'][$name] = Shop::get($name)->header();
            $params['aibody'][$name] = Shop::get($name)->body();
        }

        return Response::view(Shop::template('account.address'), $params)
            ->header('Cache-Control', 'no-store, max-age=0');
    }

    public function subscription_index()
    {
        $params = ['page' => 'page-account-index'];
        foreach (app('config')->get('shop.page.account-index') as $name) {

            $params['aiheader'][$name] = Shop::get($name)->header();
            $params['aibody'][$name] = Shop::get($name)->body();
        }

        return Response::view(Shop::template('account.subscription'), $params)
            ->header('Cache-Control', 'no-store, max-age=0');
    }

    public function favorite_index()
    {
        $params = ['page' => 'page-account-index'];
        foreach (app('config')->get('shop.page.account-index') as $name) {

            $params['aiheader'][$name] = Shop::get($name)->header();
            $params['aibody'][$name] = Shop::get($name)->body();
        }

        return Response::view(Shop::template('account.favorite'), $params)
            ->header('Cache-Control', 'no-store, max-age=0');
    }

    public function watch_index()
    {
        $params = ['page' => 'page-account-index'];
        foreach (app('config')->get('shop.page.account-index') as $name) {

            $params['aiheader'][$name] = Shop::get($name)->header();
            $params['aibody'][$name] = Shop::get($name)->body();
        }

        return Response::view(Shop::template('account.watch'), $params)
            ->header('Cache-Control', 'no-store, max-age=0');
    }
   
}
