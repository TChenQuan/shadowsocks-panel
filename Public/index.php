<?php
/**
 * KK-Framework
 * Author: kookxiang <r18@ikk.me>
 */

// Initialize constants
define('ROOT_PATH', dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
define('LIBRARY_PATH', ROOT_PATH . 'Library/');
define('DATA_PATH', ROOT_PATH . 'Data/');
define('TIMESTAMP', time());
@ini_set('display_errors', 'on');
@ini_set('expose_php', true);

// Register composer
require ROOT_PATH . 'Package/autoload.php';

// Register error handler
Core\Error::registerHandler();

// Initialize config
@include DATA_PATH . 'Config.php';

// Handler for user power
Core\Filter::register(new Helper\LoginFilter());
// Handler for json request
Core\Filter::register(new Helper\JSON());

$defaultRouter = new Core\Router();
$defaultRouter->handleRequest();