<?php

/* 
 * Класс ассет для ДжаваСкрипт пользовательский
 */

namespace application\assets;
use ItForFree\SimpleAsset\SimpleAsset;
use application\assets\JqueryAsset;

class DemoJavascriptAsset extends SimpleAsset {
    
    public $basePath = '/JS';
    
    public $js = [
        'JS-ajax.js',
        'loaderIdentity.js'
    ];
    
    
    public $needs = [
        JqueryAsset::class
        ];

}
