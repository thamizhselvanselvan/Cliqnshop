<?php
$enc = $this->encoder();
?>

 <!-- promo banner stylesheet start  -->
<style>
         .hero-banner {
            color: white;
            margin-top: 5px;
        }

        .hero-banner.promo-banner .content-body.withinCenter .content-text {
            background-repeat: no-repeat !important;
            background-size: cover !important;
            position: static;
            max-width: unset;
            transform: none;
            padding:8px;
        }

        /* .content-body {
                        position: relative;
                        display: -ms-flexbox;
                        display: flex;
                        -ms-flex-align: center;
                        align-items: center;
                    } */
        .hero-banner.promo-banner .content-body.withinCenter .content-text .content-row {
            max-width: 1260px;
            margin: 0 auto;
            -ms-flex-align: center;
            align-items: center;
        }

        .banner-heading.womensSmallBold,
        .hero-banner.promo-banner .banner-heading.womensSmallRegular {
            /* padding-top: 5px;
            margin: 0 0 5px; */
            font-family: Moneta-Bold, Times New Roman, times, serif;
            font-size: 1.5rem;
            color: var(--ai-my-primarytext-color);
            /* line-height: 47px; */
            letter-spacing: 1.88px;
        }

        .hero-banner.promo-banner .content-body.withinCenter .content-text .banner-sub-heading {
            max-width: 100%;
            color: var(--ai-my-primarytext2-color);
        }

        .hero-banner.promo-banner .post-button-details {
            letter-spacing: 1.2px;
            color: var(--ai-my-primarytext-color);
            /* margin-top: 8px; */
            font-size: 1rem;
            line-height: 24px;
            letter-spacing: .4px;
        }

        .hero-banner .cta-link {
            margin-top: 14px;
        }

        .hero-banner .cta-link,
        .hero-banner .link-cta {
            margin-right: 0;
            margin-left: 0;
        }

        .hero-banner .cta-link {
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            margin: 0 5px;
        }

        .cta-link:last-child {
            margin: 0;
            /* margin-top: 31px; */
        }

        .cta-link {
            display: inline-block;
            margin: 0 18px 0 0;
        }
        .details-holder{
            text-align: center;
        }
        .cta-links-wrap{
            text-align: end;
        }
        @media (min-width: 1023.99px) {
            .hero-banner.promo-banner .content-body.withinCenter .banner-asset.proxi-common .banner-wrapper {
                line-height: 24px;
                font-size: 16px;
            }
        }

        @media (min-width: 1024px) . {
            d-lg-none {
                display: none !important;
            }
        }
        @media only screen and (max-width:640px){
            .banner-heading.womensSmallBold, .hero-banner.promo-banner .banner-heading.womensSmallRegular{
                font-size: 0.5rem !important;
                line-height: 20px !important;
            }
            .btn-hero , .hero-banner.promo-banner .post-button-details ,.hero-banner.promo-banner .content-body.withinCenter .content-text .banner-sub-heading{
                font-size: 0.5rem !important;
            }
            .hero-banner.promo-banner .content-body.withinCenter .content-text .content-row{
                display: flex !important;
            }
        }
        @media only screen and (max-width:365px){
            .banner-heading.womensSmallBold, .hero-banner.promo-banner .banner-heading.womensSmallRegular ,.btn-hero, .hero-banner.promo-banner .post-button-details, .hero-banner.promo-banner .content-body.withinCenter .content-text .banner-sub-heading{
                font-size: 0.5rem !important;
            }
        }
        @media only screen and (max-width:640px){

        }
        /* hero button CSS */
        .btn-hero {
            --b: 3px;
            /* border thickness */
            --s: .45em;
            /* size of the corner */
            --color: #eeecec;

            padding: calc(.5em + var(--s)) calc(.9em + var(--s));
            color: var(--ai-my-primarytext-color);
            --_p: var(--s);
            background:
                conic-gradient(from 90deg at var(--b) var(--b), #0000 90deg, var(--color) 0) var(--_p) var(--_p)/calc(100% - var(--b) - 2*var(--_p)) calc(100% - var(--b) - 2*var(--_p));
            transition: .3s linear, color 0s, background-color 0s;
            outline: var(--b) solid #0000;
            outline-offset: .6em;
            font-size: 16px;

            border: 0;

            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .btn-hero:hover,
        .btn-hero:focus-visible {
            --_p: 0px;
            outline-color: #e3e1e1;
            outline-offset: .05em;
            color: var(--ai-my-primarytext-color);
        }

        .btn-hero:active {
            background: var(--color);
            color: rgb(0, 0, 0);
        }
        
        /* end hero button CSS */
</style>


<!-- promo banner stylesheet end   -->
