<?php

date_default_timezone_set('PRC');

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', isset($_SERVER['YII_DEBUG']) ? $_SERVER['YII_DEBUG']==='true' : false);
defined('YII_ENV') or define('YII_ENV', isset($_SERVER['YII_ENV']) ? $_SERVER['YII_ENV'] : 'prod');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();
