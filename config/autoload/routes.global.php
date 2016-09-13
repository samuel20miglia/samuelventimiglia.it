<?php

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\FastRouteRouter::class,
            App\Action\PingAction::class => App\Action\PingAction::class,
        ],
        'factories' => [
            App\Action\HomePageAction::class => App\Action\HomePageFactory::class,
            App\Action\AboutAction::class => App\Services\Factory\AboutPageFactory::class,
            App\Action\ContactAction::class => App\Services\Factory\ContactPageFactory::class,
            App\Action\ResumeAction::class => App\Services\Factory\ResumePageFactory::class,
            App\Action\PortfolioAction::class => App\Services\Factory\PortfolioPageFactory::class,
            App\Action\BlogAction::class => App\Services\Factory\BlogPageFactory::class
        ],
    ],

    'routes' => [
        [
            'name' => 'home',
            'path' => '/',
            'middleware' => App\Action\HomePageAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'about',
            'path' => '/about',
            'middleware' => App\Action\AboutAction::class,
            'allowed_methods' => ['GET'],
        ],

        [
            'name' => 'resume',
            'path' => '/get/resume',
            'middleware' => App\Action\ResumeAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'portfolio',
            'path' => '/portfolio',
            'middleware' => App\Action\PortfolioAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'blog',
            'path' => '/my/blog',
            'middleware' => App\Action\BlogAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'contacts',
            'path' => '/my/contacts',
            'middleware' => App\Action\ContactAction::class,
            'allowed_methods' => ['GET'],
        ]
    ],
];
