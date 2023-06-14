<?php

$routes = [];
$prefix = config('app.shop_multilocale') ? '{locale}/' : '';

if (config('app.shop_multishop') || config('app.shop_registration')) {
    $routes = ['routes' => [
        'admin' => ['prefix' => $prefix . 'admin', 'middleware' => ['web', 'auth', 'verified']],
        'jqadm' => ['prefix' => 'admin/{site}/jqadm', 'middleware' => ['web', 'auth', 'verified']],
        'jsonadm' => ['prefix' => 'admin/{site}/jsonadm', 'middleware' => ['web', 'auth', 'verified']],
        'jsonapi' => ['prefix' => '{site}/jsonapi', 'middleware' => ['web', 'api']],
        'account' => ['prefix' => $prefix . '{site}/profile', 'middleware' => ['web', 'auth', 'verified']],
        'default' => ['prefix' => $prefix . '{site}/shop', 'middleware' => ['web']],
        'supplier' => ['prefix' => $prefix . '{site}/s', 'middleware' => ['web']],
        'page' => ['prefix' => $prefix . '{site}/p', 'middleware' => ['web']],
        'home' => ['prefix' => $prefix . '{site}', 'middleware' => ['web']],
        'update' => ['prefix' => '{site}'],
    ]];
}

return $routes + [

    'apc_enabled' => false, // enable for maximum performance if APCu is available
    'apc_prefix' => 'aimeos:', // prefix for caching config and translation in APCu
    'num_formatter' => 'Locale', // locale based number formatter (alternative: "Standard")
    'pcntl_max' => 4, // maximum number of parallel command line processes when starting jobs
    'version' => env('APP_VERSION', 1), // shop CSS/JS file version

    'routes' => [
        // Docs: https://aimeos.org/docs/latest/laravel/extend/#custom-routes
        // Multi-sites: https://aimeos.org/docs/latest/laravel/customize/#multiple-shops
        'admin' => ['prefix' => 'admin', 'middleware' => ['web']],
        'jqadm' => ['prefix' => 'admin/{site}/jqadm', 'middleware' => ['web', 'auth']],
        'jsonadm' => ['prefix' => 'admin/{site}/jsonadm', 'middleware' => ['web', 'auth']],
        'jsonapi' => ['prefix' => 'jsonapi', 'middleware' => ['web', 'api']],
        'account' => ['prefix' => $prefix . 'profile', 'middleware' => ['web', 'auth']],
        'default' => ['prefix' => $prefix . 'shop', 'middleware' => ['web']],
        'supplier' => ['prefix' => $prefix . 's', 'middleware' => ['web']],
        'page' => ['prefix' => $prefix . 'p', 'middleware' => ['web']],
        'home' => ['prefix' => $prefix, 'middleware' => ['web']],
        'update' => [],
    ],

    'page' => [
        // Docs: https://aimeos.org/docs/latest/laravel/extend/#adapt-pages
        'account-index' => ['locale/select', 'basket/mini', 'catalog/tree', 'catalog/search', 'account/profile', 'account/review', 'account/subscription', 'account/history', 'account/favorite', 'account/watch', 'catalog/session', 'catalog/home', 'NewMenu/Design1','additional/footer','additional/TopBar'],
        'basket-index' => ['locale/select', 'catalog/tree', 'catalog/search', 'basket/standard', 'basket/bulk', 'basket/related', 'catalog/home', 'NewMenu/Design1','additional/footer','additional/TopBar'],
        'catalog-count' => ['catalog/count', 'NewMenu/Design1'],
        'catalog-detail' => ['locale/select', 'basket/mini', 'catalog/tree', 'catalog/search', 'catalog/stage', 'catalog/detail', 'catalog/session', 'NewMenu/Design1','additional/footer','additional/TopBar'],
        // 'catalog-home' => ['locale/select', 'basket/mini', 'catalog/tree', 'catalog/search', 'catalog/home', 'cms/page' ,],
        'catalog-list' => ['locale/select', 'basket/mini', 'catalog/filter', 'catalog/tree', 'catalog/search', 'catalog/price', 'catalog/supplier', 'catalog/attribute', 'catalog/session', 'catalog/stage', 'catalog/lists', 'NewMenu/Design1','additional/footer','additional/TopBar'],
        'catalog-session' => ['locale/select', 'basket/mini', 'catalog/tree', 'catalog/search', 'catalog/session', 'NewMenu/Design1','additional/TopBar'],
        'catalog-stock' => ['catalog/stock', 'NewMenu/Design1'],
        'catalog-suggest' => ['catalog/suggest', 'NewMenu/Design1'],
        'catalog-tree' => ['locale/select', 'basket/mini', 'catalog/filter', 'catalog/tree', 'catalog/search', 'catalog/price', 'catalog/supplier', 'catalog/attribute', 'catalog/session', 'catalog/stage', 'catalog/lists', 'NewMenu/Design1','additional/footer','additional/TopBar'],
        'checkout-confirm' => ['catalog/tree', 'catalog/search', 'checkout/confirm', 'catalog/home', 'NewMenu/Design1','additional/footer','additional/TopBar'],
        'checkout-index' => ['locale/select', 'catalog/tree', 'catalog/search', 'checkout/standard', 'catalog/home', 'NewMenu/Design1','additional/footer','additional/TopBar'],
        'checkout-update' => ['checkout/update', 'NewMenu/Design1'],
        'supplier-detail' => ['locale/select', 'basket/mini', 'catalog/tree', 'catalog/search', 'supplier/detail', 'catalog/lists', 'NewMenu/Design1','additional/footer','additional/TopBar'],
        'cms' => ['basket/mini', 'catalog/tree', 'cms/page', 'NewMenu/Design1'],

        'catalog-home' => ['locale/select', 'basket/mini', 'catalog/tree', 'catalog/home', 'catalog/search', 'additional/ProductSlider', 'additional/NewProductSlider', 'additional/catListContainer', 'additional/BrandsShowcaseSection', 'additional/ThreeBannerSection', 'additional/TwoBannerSection', 'additional/SingleBlockBannerSection', 'additional/RecentlyViewedProductSection', 'additional/PromoBannerSection', 'NewMenu/Design1', 'additional/supplementtslider','additional/footer','additional/TopBar'],

        // test pages configuration --start
        'home2-index' => ['locale/select', 'basket/mini', 'catalog/tree', 'catalog/home', 'catalog/search', 'additional/ProductSlider', 'additional/NewProductSlider', 'additional/catListContainer', 'additional/BrandsShowcaseSection', 'additional/ThreeBannerSection', 'additional/TwoBannerSection', 'additional/SingleBlockBannerSection', 'additional/RecentlyViewedProductSection', 'additional/PromoBannerSection', 'NewMenu/Design1','additional/TopBar'],
        'menutest-index' => ['locale/select', 'basket/mini', 'catalog/tree', 'catalog/home', 'catalog/search', 'additional/ProductSlider', 'additional/NewProductSlider', 'additional/catListContainer', 'additional/BrandsShowcaseSection', 'additional/ThreeBannerSection', 'additional/TwoBannerSection', 'additional/SingleBlockBannerSection', 'additional/RecentlyViewedProductSection', 'additional/PromoBannerSection', 'NewMenu/Design1','additional/TopBar'],
        // test pages configuration --end

        // auth pages configuration  --start
        'register-index' => ['catalog/tree', 'basket/mini', 'catalog/search', 'catalog/home', 'NewMenu/Design1','additional/footer','additional/TopBar'],
        'login-index' => ['catalog/tree', 'basket/mini', 'catalog/search', 'catalog/home', 'NewMenu/Design1','additional/footer','additional/TopBar'],
        'forgot-password' => ['catalog/tree', 'basket/mini', 'catalog/search', 'catalog/home', 'NewMenu/Design1','additional/footer','additional/TopBar'],
        'verify-email' => ['catalog/tree', 'basket/mini', 'catalog/search', 'catalog/home', 'NewMenu/Design1','additional/footer','additional/TopBar'],
        'confirm-password' => ['catalog/tree', 'basket/mini', 'catalog/search', 'catalog/home', 'NewMenu/Design1','additional/footer','additional/TopBar'],
        'reset-password' => ['catalog/tree', 'basket/mini', 'catalog/search', 'catalog/home', 'NewMenu/Design1','additional/footer','additional/TopBar'],
        // auth pages configuration  --end

        // shop info and additional pages cofiguration --start
        'how-it-works' => ['locale/select', 'basket/mini', 'catalog/tree', 'catalog/search', 'catalog/home', 'NewMenu/Design1','additional/footer','additional/TopBar'],
        'warranty' => ['locale/select', 'basket/mini', 'catalog/tree', 'catalog/search', 'catalog/home', 'NewMenu/Design1','additional/footer','additional/TopBar'],
        'disclaimer' => ['locale/select', 'basket/mini', 'catalog/tree', 'catalog/search', 'catalog/home', 'NewMenu/Design1','additional/footer','additional/TopBar'],
        'legal' => ['locale/select', 'basket/mini', 'catalog/tree', 'catalog/search', 'catalog/home', 'NewMenu/Design1','additional/footer'],
        'contact-index' => ['locale/select', 'basket/mini', 'catalog/tree', 'catalog/search', 'catalog/home', 'NewMenu/Design1','additional/footer','additional/TopBar'],
        'faq-index' => ['locale/select', 'basket/mini', 'catalog/tree', 'catalog/search', 'catalog/home', 'NewMenu/Design1','additional/footer','additional/TopBar'],
        'kyc-upload' => ['locale/select', 'basket/mini', 'catalog/tree', 'catalog/search', 'catalog/home', 'account/profile', 'account/review', 'account/subscription', 'account/history', 'account/favorite', 'account/watch', 'catalog/session', 'NewMenu/Design1','additional/footer','additional/TopBar'],
        'terms-index' => ['locale/select', 'basket/mini', 'catalog/tree', 'catalog/search', 'catalog/home', 'NewMenu/Design1','additional/footer','additional/TopBar'],
        'privacy-index' => ['locale/select', 'basket/mini', 'catalog/tree', 'catalog/search', 'catalog/home', 'NewMenu/Design1','additional/footer','additional/TopBar'],
        'return-index' => ['locale/select', 'basket/mini', 'catalog/tree', 'catalog/search', 'catalog/home', 'NewMenu/Design1','additional/footer','additional/TopBar'],
        // shop info and additional pages cofiguration --end

    ],

    'resource' => [
        'db' => [
            'adapter' => config('database.connections.' . config('database.default', 'mysql') . '.driver', 'mysql'),
            'host' => config('database.connections.' . config('database.default', 'mysql') . '.host', '127.0.0.1'),
            'port' => config('database.connections.' . config('database.default', 'mysql') . '.port', '3306'),
            'socket' => config('database.connections.' . config('database.default', 'mysql') . '.unix_socket', ''),
            'database' => config('database.connections.' . config('database.default', 'mysql') . '.database', 'forge'),
            'username' => config('database.connections.' . config('database.default', 'mysql') . '.username', 'forge'),
            'password' => config('database.connections.' . config('database.default', 'mysql') . '.password', ''),
            'stmt' => config('database.default', 'mysql') === 'mysql' ? ["SET SESSION sort_buffer_size=2097144; SET NAMES 'utf8mb4'; SET SESSION sql_mode='ANSI'"] : [],
            'limit' => 3, // maximum number of concurrent database connections
            'defaultTableOptions' => [
                'charset' => config('database.connections.' . config('database.default', 'mysql') . '.charset'),
                'collate' => config('database.connections.' . config('database.default', 'mysql') . '.collation'),
            ],
            'driverOptions' => config('database.connections.' . config('database.default', 'mysql') . '.options'),
        ],
        'fs' => [
            'adapter' => 'Standard',
            'tempdir' => storage_path('tmp'),
            'basedir' => public_path('mosh_cliqnshop'),
            'baseurl' => rtrim(env('ASSET_URL', PHP_SAPI == 'cli' ? env('APP_URL') : '', '/')) . '/mosh_cliqnshop',
        ],
        'fs-media' => [
            'adapter' => 'Standard',
            'tempdir' => storage_path('tmp'),
            'basedir' => public_path('mosh_cliqnshop'),
            'baseurl' => rtrim(env('ASSET_URL', PHP_SAPI == 'cli' ? env('APP_URL') : '', '/')) . '/mosh_cliqnshop',
        ],
        'fs-mimeicon' => [
            'adapter' => 'Standard',
            'tempdir' => storage_path('tmp'),
            'basedir' => public_path('vendor/shop/mimeicons'),
            'baseurl' => rtrim(env('ASSET_URL', PHP_SAPI == 'cli' ? env('APP_URL') : '', '/')) . '/vendor/shop/mimeicons',
        ],
        'fs-theme' => [
            'adapter' => 'Standard',
            'tempdir' => storage_path('tmp'),
            'basedir' => public_path('vendor/shop/themes'),
            'baseurl' => rtrim(env('ASSET_URL', PHP_SAPI == 'cli' ? env('APP_URL') : '', '/')) . '/vendor/shop/themes',
        ],
        'fs-admin' => [
            'adapter' => 'Standard',
            'tempdir' => storage_path('tmp'),
            'basedir' => storage_path('admin'),
        ],
        'fs-export' => [
            'adapter' => 'Standard',
            'tempdir' => storage_path('tmp'),
            'basedir' => storage_path('export'),
        ],
        'fs-import' => [
            'adapter' => 'Standard',
            'tempdir' => storage_path('tmp'),
            'basedir' => storage_path('import'),
        ],
        'fs-secure' => [
            'adapter' => 'Standard',
            'tempdir' => storage_path('tmp'),
            'basedir' => storage_path('secure'),
        ],
        'mq' => [
            'adapter' => 'Standard',
            'db' => 'db',
        ],
        'email' => [
            'from-email' => config('mail.from.address'),
            'from-name' => config('mail.from.name'),
        ],
    ],

    // custom Content Security Policy (https://content-security-policy.com/)
    'csp' => [
        'frontend' => "style-src 'unsafe-inline' 'self'; img-src 'self' data: https://aimeos.org https://m.media-amazon.com; frame-src https://www.youtube.com https://player.vimeo.com",
        'backend' => "style-src 'unsafe-inline' 'self' https://cdnjs.cloudflare.com https://cdn.jsdelivr.net; script-src 'unsafe-eval' 'self' https://cdnjs.cloudflare.com https://cdn.jsdelivr.net; img-src 'self' data: blob: https://cdnjs.cloudflare.com https://cdn.jsdelivr.net https://*.tile.openstreetmap.org https://aimeos.org https://m.media-amazon.com; frame-src https://www.youtube.com https://player.vimeo.com",
    ],

    'admin' => [
     'jqadm' => [
        'resource' => [
            'catalog' => [
                'groups' => [
                    1 => 'admin',
                    2 => 'editor',
                    3 => 'super',
                    4 => 'catalog',
                ],
            ],
            'goods' => [
                'groups' => [
                    1 => 'admin',
                    2 => 'editor',
                    3 => 'super',
                    4 => 'catalog',
                ],
            ],
            'product' => [
                'groups' => [
                    1 => 'admin',
                    2 => 'editor',
                    3 => 'super',
                    4 => 'catalog',
                ],
            ],
            'attribute' => [
                'groups' => [
                    1 => 'admin',
                    2 => 'editor',
                    3 => 'super',
                    4 => 'catalog',
                ],
            ],
            'supplier' => [
                'groups' => [
                    1 => 'admin',
                    2 => 'editor',
                    3 => 'super',
                    4 => 'catalog',
                ],
            ],
            'sales' => [
                'groups' => [
                    1 => 'admin',
                    2 => 'editor',
                    3 => 'super',
                    4 => 'order',
                ],
            ],
            'order' => [
                'groups' => [
                    1 => 'admin',
                    2 => 'editor',
                    3 => 'super',
                    4 => 'order',
                ],
            ]
        ]
     ]
    ],
    'client' => [
        'html' => [
            'account' => [
                'watch' => [
                    'size' => 12,
                ],
            ],
            'cms' => [
                'page' => [
                    'basket-add' => 'true',
                ],
            ],
            'locale' => [
                'select' => [
                    'subparts' => [
                        // 0 => 'language',
                        // 1 => 'currency',
                    ],
                ],
            ],
            'checkout' =>
            [
                'standard' =>
                [
                    'address' =>
                    [
                        'validate' => [
                            'postal' => '^[0-9]+$',
                            'telephone' => '^[0-9]{10}+$',
                        ],
                        'billing' =>
                        [
                            'optional' => [
                                0 => 'order.base.address.salutation',
                            ],
                            'mandatory' =>
                            [
                                0 => 'order.base.address.firstname',
                                1 => 'order.base.address.lastname',
                                2 => 'order.base.address.address1',
                                3 => 'order.base.address.postal',
                                4 => 'order.base.address.city',
                                5 => 'order.base.address.email',
                                6 => 'order.base.address.telephone',
                                7 => 'order.base.address.countryid',
                                8 => 'order.base.address.address2',
                            ],
                        ],
                        'delivery' =>
                        [
                            'optional' => [
                                0 => 'order.base.address.salutation',
                            ],
                            'mandatory' =>
                            [
                                0 => 'order.base.address.firstname',
                                1 => 'order.base.address.lastname',
                                2 => 'order.base.address.address1',
                                3 => 'order.base.address.postal',
                                4 => 'order.base.address.city',
                                5 => 'order.base.address.telephone',
                                6 => 'order.base.address.countryid',
                                7 => 'order.base.address.address2',
                            ],
                        ],
                    ],
                ],
            ],
            'basket' => [
                'related' => [

                    'bought' => [
                        'limit' => 8,
                    ],
                ],
                'cache' => [
                    // 'enable' => false, // Disable basket content caching for development
                ],
            ],

            'common' => [
                'cache' => [
                    // 'force' => true // enforce caching for logged in users
                ],
            ],
            'catalog' => [
                'suggest' => [
                    'name' => 'Catsuggestnew',
                ],
                'stage' => [
                    'name' => 'Standardnew',
                ],
                'session' => [
                    'seen' => [
                        'maxitems' => 20,
                    ],
                ],
                'social' => [
                    'list' => ['facebook', 'twitter', 'whatsapp'],
                ],
                'home' => [
                    'template-body' => 'catalog/home/newbody',
                    'template-header' => 'catalog/home/newheader',
                ],

                'detail' => [
                    'name' => 'StandardNew',
                    'template-body' => 'catalog/detail/newbody',
                    'template-header' => 'catalog/detail/newheader',
                    'partials' => [
                        'image' => 'catalog/detail/newimage'
                    ],

                ],
                'filter' => [
                    'supplier' => [
                        'name' => 'Mystandard',
                    ],
                    'attribute' => [
                        'types' => ['color'],
                    ],
                ],
                'count' => [
                    'subparts' => [
                        0 => 'supplier',
                        1 => 'attribute',
                        // 2 => 'tree',
                    ],
                    'enable' => 1,
                ],
                'lists' => [
                    'pages' => 1000,
                    'levels' => 2,
                    'template-body' => 'catalog/lists/newbody',
                    'template-header' => 'catalog/lists/newheader',
                    'name' => 'StandardUpdated',
                    'basket-add' => true, // shows add to basket in list views
                    // 'infinite-scroll' => true, // load more products in list view
                    // 'size' => 48, // number of products per page
                    'domains' => [
                        0 => 'catalog',
                        1 => 'media',
                        2 => 'media/property',
                        3 => 'price',
                        4 => 'supplier',
                        5 => 'text',
                    ],
                ],
                'selection' => [
                    'type' => [ // how variant attributes are displayed
                        'color' => 'radio',
                        'length' => 'radio',
                        'width' => 'radio',
                        'size' => 'radio',
                    ],
                ],

            ],
        ],
    ],

    // 'controller' => [
    //     'frontend' => [
    //         'catalog' => [
    //             'levels-always' => 3, // number of category levels for mega menu
    //         ],
    //     ],
    // ],

    'controller' => [
        'common' => [
            'product' => [
                'import' => [
                    'csv' => [
                        'processor' => [
                            'product' => [
                                'listtypes' => ['default', 'bought-together', 'suggestion', 'variant'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'frontend' => [
            'product' =>[
                'name' => 'myProduct'
            ],
            'common' => [
                'max-size' => 5000,
            ],
            'review' => [
                'status' => 1,
            ],
            'catalog' => [

                'levels-always' => 2,
            ],
        ],
        'jobs' =>
        [
            'order' => [
                'cleanup' => [
                    'unpaid' => [
                        'keep-days' => 1,
                    ],
                    'unfinished' => [
                        'keep-hours' => 1,
                    ],
                ],
                'service' => [
                    'payment' => [
                        'capture-days' => 1,
                    ],
                ],
                'email' => [
                    'delivery' => [
                        'template-html' => 'order/email/delivery/htmlnew',
                        'status' => [
                            0 => 2,
                            1 => 3,
                            2 => 4,
                            3 => 7,
                        ],
                    ],
                    'payment' => [
                        'template-html' => 'order/email/payment/htmlnew',
                        'template-pdf' => 'order/email/payment/invoice-pdf',
                        'status' => [
                            0 => 6,
                            1 => 5,
                        ],
                        'pdf' => 1,
                        'attachments' => [],
                    ],
                ],
            ],
            'catalog' =>
            [
                'import' =>
                [
                    'csv' =>
                    [
                        // 'name' => 'Cat',
                        //  'max-size' => 45000,
                        'location' => base_path('storage/import_cat'),
                        'skip-lines' => 1,
                        'mapping' =>
                        [
                            'item' => [
                                0 => 'catalog.code',
                                1 => 'catalog.parent',
                                2 => 'catalog.label',
                                3 => 'catalog.status',
                            ],
                            'text' => [
                                4 => 'text.content',
                                5 => 'text.type',
                                6 => 'text.content',
                                7 => 'text.type',
                                8 => 'text.content',
                                9 => 'text.type',
                                10 => 'text.content',
                                11 => 'text.type',
                                12 => 'text.content',
                                13 => 'text.type',
                                14 => 'text.content',
                                15 => 'text.type',
                            ],
                            'media' => [
                                16 => 'media.url',
                                17 => 'media.type',
                            ],
                        ],
                    ],
                ],
            ],

            'product' =>
            [
                'bought' => [
                    'limit-days' => 30,
                ],
                'import' =>
                [
                    'csv' =>
                    [
                        //  'max-size' => 100000,
                        'location' => base_path('storage/import_product'),
                        'skip-lines' => 1,
                        'mapping' =>
                        [
                            'item' =>
                            [
                                0 => 'product.code',
                                1 => 'product.label',
                                2 => 'product.type',
                                3 => 'product.status',
                            ],
                            'text' =>
                            [
                                4 => 'text.type',
                                5 => 'text.content',
                                6 => 'text.type',
                                7 => 'text.content',
                            ],
                            'media' =>
                            [
                                8 => 'media.preview',
                                9 => 'media.url',
                                10 => 'media.preview',
                                11 => 'media.url',
                                12 => 'media.preview',
                                13 => 'media.url',
                                14 => 'media.preview',
                                15 => 'media.url',
                                16 => 'media.preview',
                                17 => 'media.url',
                                18 => 'media.preview',
                                19 => 'media.url',
                                20 => 'media.preview',
                                21 => 'media.url',
                                22 => 'media.preview',
                                23 => 'media.url',
                                24 => 'media.preview',
                                25 => 'media.url',
                                26 => 'media.preview',
                                27 => 'media.url',
                            ],
                            'price' =>
                            [
                                28 => 'price.currencyid',
                                29 => 'price.quantity',
                                30 => 'price.value',
                                31 => 'price.taxrate',
                                32 => 'price.currencyid',
                                33 => 'price.quantity',
                                34 => 'price.value',
                                35 => 'price.taxrate',
                                36 => 'price.currencyid',
                                37 => 'price.quantity',
                                38 => 'price.value',
                                39 => 'price.taxrate',
                                40 => 'price.currencyid',
                                41 => 'price.quantity',
                                42 => 'price.value',
                                43 => 'price.taxrate',
                                44 => 'price.currencyid',
                                45 => 'price.quantity',
                                46 => 'price.value',
                                47 => 'price.taxrate',
                            ],
                            'attribute' =>
                            [
                                48 => 'attribute.code',
                                49 => 'attribute.type',
                                50 => 'attribute.label',
                                51 => 'attribute.position',
                                52 => 'attribute.status',
                                53 => 'product.lists.type',
                                54 => 'attribute.code',
                                55 => 'attribute.type',
                                56 => 'attribute.label',
                                57 => 'attribute.position',
                                58 => 'attribute.status',
                                59 => 'product.lists.type',
                                60 => 'attribute.code',
                                61 => 'attribute.type',
                                62 => 'attribute.label',
                                63 => 'attribute.position',
                                64 => 'attribute.status',
                                65 => 'product.lists.type',
                                66 => 'attribute.code',
                                67 => 'attribute.type',
                                68 => 'attribute.label',
                                69 => 'attribute.position',
                                70 => 'attribute.status',
                                71 => 'product.lists.type',
                                72 => 'attribute.code',
                                73 => 'attribute.type',
                                74 => 'attribute.label',
                                75 => 'attribute.position',
                                76 => 'attribute.status',
                                77 => 'product.lists.type',
                            ],
                            'product' =>
                            [
                                78 => 'product.code',
                                79 => 'product.lists.type',
                                80 => 'product.code',
                                81 => 'product.lists.type',
                                82 => 'product.code',
                                83 => 'product.lists.type',
                                84 => 'product.code',
                                85 => 'product.lists.type',
                                86 => 'product.code',
                                87 => 'product.lists.type',
                                88 => 'product.code',
                                89 => 'product.lists.type',
                                90 => 'product.code',
                                91 => 'product.lists.type',
                                92 => 'product.code',
                                93 => 'product.lists.type',
                                94 => 'product.code',
                                95 => 'product.lists.type',
                                96 => 'product.code',
                                97 => 'product.lists.type',
                            ],
                            'property' =>
                            [
                                98 => 'product.property.value',
                                99 => 'product.property.type',
                            ],
                            'catalog' =>
                            [
                                100 => 'catalog.code',
                                101 => 'catalog.code',
                                102 => 'catalog.code',
                                103 => 'catalog.code',
                                104 => 'catalog.lists.type',
                                105 => 'catalog.lists.datestart',
                                106 => 'catalog.lists.dateend',
                                107 => 'catalog.lists.config',
                                108 => 'catalog.lists.position',
                                109 => 'catalog.lists.status',
                            ],

                            'supplier' =>
                            [
                                110 => 'supplier.code',
                                111 => 'supplier.lists.type',
                                112 => 'supplier.lists.datestart',
                                113 => 'supplier.lists.dateend',
                                114 => 'supplier.lists.config',
                                115 => 'supplier.lists.position',
                                116 => 'supplier.lists.status',
                            ],
                            'stock' =>
                            [
                                117 => 'stock.stocklevel',
                                118 => 'stock.type',
                                119 => 'stock.dateback',
                            ],
                        ],

                    ],
                ],

            ],
            'supplier' =>
            [
                'import' =>
                [
                    'csv' =>
                    [
                        // 'max-size' => 40000,
                        'location' => base_path('storage/import_brand'),
                        'skip-lines' => 1,
                        'mapping' =>
                        [
                            'item' =>
                            [
                                0 => 'supplier.code',
                                1 => 'supplier.label',
                                2 => 'supplier.status',
                            ],

                            'text' =>
                            [
                                3 => 'text.languageid',
                                4 => 'text.type',
                                5 => 'text.content',
                            ],

                            'media' =>
                            [
                                6 => 'media.type',
                                7 => 'media.url',
                            ],

                            'address' =>
                            [
                                8 => 'supplier.address.languageid',
                                9 => 'supplier.address.countryid',
                                10 => 'supplier.address.city',
                            ],

                        ],
                    ],

                ],
            ],
        ],
    ],

    'i18n' => [
        'en' => [
            'controller/jobs' => [
                '%1$s %2$s' => ['%2$s %1$s'],
                'Your order %1$s' => ['Cliqnshop'],
                'Thank you for your order %1$s from %2$s.' => ['Thanks for your order <br><br> Your order no. %1$s from %2$s.'],
            ],
            'client' => [
                'A non-recoverable error occured' => ['Something Went Wrong'],
                'Suppliers' => ['Brands'],
                'Supplier information' => ['Brand information'],
                'Telephone' => ['Mobile No.'],
                '+1 123 456 7890' => ['123 456 7890'],
                'No articles found for <span class="searchstring">"%1$s"</span>. Please try again with a different keyword.' => ["Oh No! We were not able to find any product in our database.

                But don't be sad, we are looking for it."],
                'Article no.' => ['SKU'],
            ],
            'admin' => [
                'supplier' => ['Brands'],
                'Supplier' => ['Brands'],
                'Telephone' => ['Mobile No.'],
                '+1 123 456 7890' => ['123 456 7890'],
            ],
            'client/code' => [
                'price:default' => ['%2$s %1$s'],
            ],
            'mshop' => [
                'Basket empty' => [''],
            ],
        ],
    ],

    'madmin' => [
        'cache' => [
            'manager' => [
                'name' => 'None', // Disable caching for development
            ],
        ],
        'log' => [
            'manager' => [
                //    'loglevel' => 7, // Enable debug logging into madmin_log table
            ],
        ],
    ],

    'mshop' => [
        'index' => [
            'manager' => [
                'text' => [
                    'name' => 'ExtendedStandard',
                ],
            ],
        ],
        'locale' => [
            'site' => 'in', // used instead of "default"
        ],
    ],

    'command' => [],

    'frontend' => [],

    'backend' => [],

    'authorize' => ['true'],
    'roles' => ['admin', 'editor','order','catalog'] ,
];
