<?php
// 线上配置
if ( strtoupper(substr(PHP_OS, 0, 5)) == 'LINUX' ) {
    // 预发布
    if ( substr( $_SERVER['SERVER_NAME'], -9 ) == 'ineln.com') {
        $environment = 'pre';
        defined('LOGIN_COOKIE_NAME') or define('LOGIN_COOKIE_NAME', 'pre_ygu');
        defined('CENTER_URL') or define('CENTER_URL', 'http://center.ineln.com');
        defined('MAIN_DOMAIN') or define('MAIN_DOMAIN', '.ineln.com');
        defined('SELF_URL') or define('SELF_URL', 'http://ets.ineln.com');
        defined('EMAIL_TASKS_UPLOAD_PATH') or define('EMAIL_TASKS_UPLOAD_PATH', '/home/uploads/email_tasks/');
        // 线上
    } else {
        $environment = 'prod';
        defined('LOGIN_COOKIE_NAME') or define('LOGIN_COOKIE_NAME', 'ygu');
        defined('CENTER_URL') or define('CENTER_URL', 'http://www.integle.com');
        defined('MAIN_DOMAIN') or define('MAIN_DOMAIN', '.integle.com');
        defined('SELF_URL') or define('SELF_URL', 'http://ets.integle.com');
        defined('EMAIL_TASKS_UPLOAD_PATH') or define('EMAIL_TASKS_UPLOAD_PATH', '/home/uploads/email_tasks/');
    }

    // 本地配置
} else {
    $environment = 'dev';
    defined('LOGIN_COOKIE_NAME') or define('LOGIN_COOKIE_NAME', 'dev_ygu');
    defined('CENTER_URL') or define('CENTER_URL', 'http://dev.center.integle.com');
    defined('MAIN_DOMAIN') or define('MAIN_DOMAIN', '.integle.com');
    defined('SELF_URL') or define('SELF_URL', 'http://dev.ets.integle.com');
    defined('EMAIL_TASKS_UPLOAD_PATH') or define('EMAIL_TASKS_UPLOAD_PATH', '\\\\192.168.100.18\uploads\files\email_tasks\\');
}

if('dev' == $environment) {
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'dev');

    require(__DIR__ . '/../../vendor/autoload.php');
    require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');
    require(__DIR__ . '/../../common/config/bootstrap.php');
    require(__DIR__ . '/../config/bootstrap.php');
    
    $config = yii\helpers\ArrayHelper::merge(
        require(__DIR__ . '/../../common/config/main.php'),
        require(__DIR__ . '/../../common/config/main-local.php'),
        require(__DIR__ . '/../config/main.php'),
        require(__DIR__ . '/../config/main-local.php')
    );
} else {
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'dev');

    require(__DIR__ . '/../../vendor/autoload.php');
    require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');

    require(__DIR__ . '/../../common/config/bootstrap.php');
    require(__DIR__ . '/../config/bootstrap.php');

    $config = yii\helpers\ArrayHelper::merge(
        require(__DIR__ . '/../../common/config/main.php'),
        require(__DIR__ . '/../config/main.php')
    );
}

(new yii\web\Application($config))->run();
