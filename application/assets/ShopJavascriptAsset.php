<?php

/* 
 * Класс ассет для ДжаваСкрипт пользовательский
 */

namespace application\assets;
use ItForFree\SimpleAsset\SimpleAsset;
use application\assets\JqueryAsset;

class ShopJavascriptAsset extends SimpleAsset {
    
    public $basePath = '/JS';
    
    public $js = [
        'JS-ajax-shop.js'
    ];
    
    
    public $needs = [
        JqueryAsset::class
        ];

}
