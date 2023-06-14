<?php

namespace Aimeos\Client\Html\Additional\Footer;

use App\Models\FooterContent;

class Standard extends \Aimeos\Client\Html\Catalog\Base implements \Aimeos\Client\Html\Iface

{

    private $tags = [];
    private $expire;
    private $view;

    public function body(string $uid = ''): string
    {

        $confkey = 'client/html/additional/footer';
        $config = $this->context()->config();

        if ($html = $this->cached('body', $uid, [], $confkey)) {
            return $this->modify($html, $uid);
        }

        $template = $config->get('client/html/additional/footer/template-body', 'additional/footer/body');
        $view = $this->view = $this->view ?? $this->object()->data($this->view(), $this->tags, $this->expire);
        $html = $view->render($template);

        return $this->cache('body', $uid, [], $confkey, $html, $this->tags, $this->expire);
    }

    public function header(string $uid = ''): ?string
    {
        $confkey = 'client/html/additional/footer';
        $config = $this->context()->config();

        if ($html = $this->cached('header', $uid, [], $confkey)) {
            return $this->modify($html, $uid);
        }

        $template = $config->get('client/html/additional/newproductslider/template-header', 'additional/footer/header');
        $view = $this->view = $this->view ?? $this->object()->data($this->view(), $this->tags, $this->expire);
        $html = $view->render($template);

        return $this->cache('header', $uid, [], $confkey, $html, $this->tags, $this->expire);
    }

    public function data(\Aimeos\Base\View\Iface$view, array&$tags = [], string&$expire = null): \Aimeos\Base\View\Iface
    {
        $context = $this->context();
        $config = $context->config();

        $context = app('aimeos.context')->get(false);
        $locale = $context->locale();
        $site = ($locale)->getsiteid();
        $sitecode = ($locale)->getSiteItem()->getCode();

        $template = $config->get('client/html/additional/footer/template-header', 'additional/footer/header');
        $array_call_us = FooterContent::where('site_name', $sitecode)->where('content_name', 'Call Us')->pluck('content')->ToArray();
        $array_email_us = FooterContent::where('site_name', $sitecode)->where('content_name', 'Email for Us')->pluck('content')->ToArray();
        $array_facebook = FooterContent::where('site_name', $sitecode)->where('content_name', 'Facebook')->pluck('content')->ToArray();
        $array_twitter = FooterContent::where('site_name', $sitecode)->where('content_name', 'Twitter')->pluck('content')->ToArray();
        $array_instagram = FooterContent::where('site_name', $sitecode)->where('content_name', 'Instagram')->pluck('content')->ToArray();
        $array_youtube = FooterContent::where('site_name', $sitecode)->where('content_name', 'Youtube')->pluck('content')->ToArray();
        if (empty($array_call_us)) {
            $call_us = '';
        } else {
            $call_us = $array_call_us[0];
        }
        if (empty($array_email_us)) {
            $email_us = '';
        } else {
            $email_us = $array_email_us[0];
        }
        if (empty($array_facebook)) {
            $facebook = '';
        } else {
            $facebook = $array_facebook[0];
        }
        if (empty($array_twitter)) {
            $twitter = '';
        } else {
            $twitter = $array_twitter[0];
        }
        if (empty($array_instagram)) {
            $instagram = '';
        } else {
            $instagram = $array_instagram[0];
        }
        if (empty($array_youtube)) {
            $youtube = '';
        } else {
            $youtube = $array_youtube[0];
        }
        $view->facebook = $facebook;
        $view->twitter = $twitter;
        $view->instagram = $instagram;
        $view->youtube = $youtube;
        $view->email_us = $email_us;
        $view->call_us = $call_us;
        $view->sitecode = $sitecode;
        return parent::data($view, $tags, $expire);
    }
}
