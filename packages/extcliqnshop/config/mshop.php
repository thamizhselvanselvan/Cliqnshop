<?php

return [
    'product' => [
        'manager' => [
            'decorators' => [
                'local' => ['ExtendedStandard'],
            ],
        ],
    ],
    'keyword' => [
        'manager' => [
            'decorators' => [
                'local' => [
                    'Search' => 'Search',
                ],
            ],
        ],
    ],
];
