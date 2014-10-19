<?php
/**
 * Munee: Optimising Your Assets
 *
 * @copyright Cody Lundquist 2013
 * @license http://opensource.org/licenses/mit-license.php
 */

defined('DS') || define('DS' , DIRECTORY_SEPARATOR);
defined('WEBROOT') || define('WEBROOT', __DIR__ . DS . 'tmp');

$muneePath = __DIR__ . DS . '..';

spl_autoload_register(function ($class) use ($muneePath) {
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    foreach (array('tests') as $dirPrefix) {
        $file = $muneePath . DS . $dirPrefix . DS . $path . '.php';
        if (file_exists($file)) {
            require_once $file;
            break;
        }
    }
});

require $muneePath . DS . 'vendor' . DS . 'autoload.php';
require $muneePath . DS . 'config' . DS . 'bootstrap.php';