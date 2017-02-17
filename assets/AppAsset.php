<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';



//Include  CSS;
    public $css = [
        'css/site.css',
        'css/calc.css', // Calc  css
        'css/split.css', // split  css
        'css/mine.css',
        'css/geocoding.css',  //  geocoding  css
        'css/reroute.css', 
        
    ];




//Include JS;
    public $js = [
        'js/jquery-3.1.1.min.js',  // JQUERY
        'js/calc.js',             // Calc  JS
        'js/split.js',           //Split  JS
        'js/geocoding.js',           //Geocoding  JS
        'js/reroute.js',
       
        

    ];




    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
         'yii\bootstrap\BootstrapThemeAsset',  //  my  edit  for  BStrap  Themes;
    ];
}
