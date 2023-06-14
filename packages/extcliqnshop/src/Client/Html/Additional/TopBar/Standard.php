<?php

namespace Aimeos\Client\Html\Additional\TopBar;

use Illuminate\Support\Facades\DB;

class Standard extends \Aimeos\Client\Html\Catalog\Base implements \Aimeos\Client\Html\Iface

{
    private $tags = [];
    private $expire;
    private $view;

    public function body(string $uid = ''): string
    {
        $confkey = 'client/html/additional/topbar';
        $config = $this->context()->config();

        if ($html = $this->cached('body', $uid, [], $confkey)) {
            return $this->modify($html, $uid);
        }

        $template = $config->get('client/html/additional/topbar/template-body', 'additional/topbar/body');
        $view = $this->view = $this->view ?? $this->object()->data($this->view(), $this->tags, $this->expire);
        $html = $view->render($template);

        return $this->cache('body', $uid, [], $confkey, $html, $this->tags, $this->expire);
    }

    public function header(string $uid = ''): ?string
    {
        $confkey = 'client/html/additional/topbar';
        $config = $this->context()->config();

        if ($html = $this->cached('header', $uid, [], $confkey)) {
            return $this->modify($html, $uid);
        }

        $template = $config->get('client/html/additional/topbar/template-header', 'additional/topbar/header');
        $view = $this->view = $this->view ?? $this->object()->data($this->view(), $this->tags, $this->expire);
        $html = $view->render($template);

        return $this->cache('header', $uid, [], $confkey, $html, $this->tags, $this->expire);
    }

    public function data(\Aimeos\Base\View\Iface$view, array&$tags = [], string&$expire = null): \Aimeos\Base\View\Iface
    {
        $context = $this->context();  
        $locale = $this->context()->locale();          
        $config = $context->config();
        
        $site = $locale->getSiteItem()->getSiteId();
        $currencyId = $locale->getCurrencyId();   

        $currentTime= now();
                
        $coupan = DB::table('mshop_coupon_code')
                        ->leftJoin('mshop_coupon', 'mshop_coupon.id', "=", 'mshop_coupon_code.parentid')
                        ->where([
                                    ['mshop_coupon.status' ,'1'],
                                    ['mshop_coupon_code.count','>=', '1'],
                                    ['mshop_coupon_code.siteid', $site ]

                                ])  
                        ->orderBy('mshop_coupon_code.id' ,'desc')
                        ->get();

        // filtering with start and end date of coupons --start         
            $couponFilter = $coupan->filter(function ($item) use ($currentTime)
            {
                  
                if (is_null($item->start) && is_null($item->end))
                {
                    return true;
                }
                else if ($item->start <= $currentTime  &&  $item->end >= $currentTime)
                {
                    return $item;
                }
                else if ($item->start <= $currentTime  && is_null($item->end))
                {
                    return $item;
                } 
                else if ($item->end >= $currentTime  && is_null($item->start))
                {
                    return $item;
                }                         
                    
            });                    
        // filtering with start and end date of coupons --end 
        
       
        
        $view->couponsAvailable =  $couponFilter;
        return parent::data($view, $tags, $expire);

    }   

}