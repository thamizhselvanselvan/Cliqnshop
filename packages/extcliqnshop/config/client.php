<?php

return [
	'html' => [
		'catalog' => [
            'lists' => [
                'decorators' => [
                    'global' => ['ListCategories'],
                ],
            ],

            'detail' => [
                'decorators' => [
                    'global' => ['ProductDtailDecorator'],
                ]
            ]
        ],
	],
	'jsonapi' => [
	],
];
