<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    	'css/bootstrap.min.css',
    	'css/metisMenu.min.css',
    	'css/sb-admin-2.css',
    	'css/morris.css',
    	'css/font-awesome-4.3.0/css/font-awesome.min.css',
    ];
    public $js = [
    		'js/bootstrap.min.js',
    	'js/morris.min.js',
    		'js/raphael.min.js',
    		'js/morris.min.js',
    		'js/morris-data.js',
    		'js/sb-admin-2.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
