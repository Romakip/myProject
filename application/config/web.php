<?php
/**
 * Конфигурационной файл приложения
 */
$config = [
    'core' => [ // подмассив используемый самим ядром фреймворка
        'db' => [
            'dns' => 'mysql:host=localhost;dbname=smvcbase',
            'username' => 'root',
            'password' => '1234'
        ],
        'router' => [
            'class' => \ItForFree\SimpleMVC\Router::class    
        ],
        'url' => [ 
            'class' => \ItForFree\SimpleMVC\Url::class
        ],
        'mvc' => [
            'views' => [
                'base-template-path' => '../application/views/',
                'base-layouts-path' => '../application/views/layouts/',
                'footer-path' => '',
                'header-path' => ''
            ]
        ],
        'handlers' => [
            'ItForFree\SimpleMVC\exceptions\SmvcAccessException' => \application\handlers\UserExceptionHandler::class,
            'ItForFree\SimpleMVC\exceptions\SmvcRoutingException' => \application\handlers\UserExceptionHandler::class
            //'ItForFree\SimpleMVC\exceptions\SmvcRoutingException' => \application\handlers\ArticleExceptionHandler::class
        ],
        'user' => [
            'class' => \application\models\ExampleUser::class
        ],
        'session' => [
            'class' => ItForFree\SimpleMVC\Session::class
        ],
        'article' => [
            'class' => \application\models\Article::class       
        ],
        'category' => [
            'class' => \application\models\Category::class
        ],
        'subcategory' => [
            'class' => \application\models\Subcategory::class
        ]
    ]    
];

return $config;