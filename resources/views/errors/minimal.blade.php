<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>


        <style>
            body {
                font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                 overflow: hidden;
            }

            .overlay1 {
                position: relative;
                z-index: 1;
                width: 100%;
                min-height: 100vh;
            }

            .overlay1::before {
                content: "";
                display: block;
                position: absolute;
                z-index: -1;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                /* background-color: rgba(0,0,0,.8); */
            }
            .simpleslide100 {
                display: block;
                position: fixed;
                z-index: 0;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
            }
            .bg_img {
                Background-image:url(/img/background.jpg);
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                object-fit: contain;
            }
            .simpleslide100-item {
                display: block;
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
            }

            .logo_bg {
                height: 100px;
                width: 100%;
                margin-bottom: 10px; 
                Background-image:url("{{ asset( 'mosh_cliqnshop/' . ( app( 'aimeos.context' )->get()->locale()->getSiteItem()->getLogo() ?: '../vendor/shop/themes/cliqnshop/assets/logo.png' ) ) }}");
                /* background-image:url("/img/Cliqnshop.svg"); */
                background-position: center;
                background-repeat: no-repeat;
                background-size: 100%;
            }

            /* .tg {
                align-items: center;
                justify-content: center;
            } */
            .center {
                width: 100%;
                min-height: 100vh;
                
                display: flex;
                align-items: center;
                justify-content: center;
                
            }

            .center_color {
                /* padding: 10px 20px; */
                /* margin: 0 20px; */
            }

        </style>
    </head>
    <body class="antialiased">
        <div class="simpleslide100">
            <div alt="Background Image" class="simpleslide100-item bg_img"></div>
        </div>
        <div class="overlay1">
            <div class="tg">
                <div class="center">

                    <div style="color:#1d262d; font-size: 2em; font-weight: bold; text-align: center; " class="uppercase center_color">
                        <div class="logo_bg"></div>    
                        @yield('message')
                        {{-- <p style="margin-top: 0; font-size: .5em; font-weight: normal;">Our website is under construction</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
