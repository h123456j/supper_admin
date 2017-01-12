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
class CommonAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/static';
    public $css = [
        'css/common.css',
    ];
    public $js = [
        'js/plugin/jquery.form.js',
        'js/ajax.form.js',
        'js/common.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
