<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
    error_reporting(E_ALL);
    
    ! defined('BASE_PATH') && define('BASE_PATH', dirname(__DIR__, 1));
    
    \Swoole\Runtime::enableCoroutine(true);
    
    require BASE_PATH . '/vendor/autoload.php';
    
