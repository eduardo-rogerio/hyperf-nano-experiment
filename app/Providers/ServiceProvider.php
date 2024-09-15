<?php

namespace Mixd\App\Providers;

use Hyperf\Contract\ContainerInterface;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

class ServiceProvider
{
    public static function register(ContainerInterface $container): void
    {
//        $container->set(DatabaseConfig::class, function () {
//            return new DatabaseConfig();
//        });
        self::loadLogs($container);
    }

    public static function loadLogs(ContainerInterface $app): void
    {
        $logger = new Logger('hyperf');
        $logFile = BASE_PATH . '/runtime/logs/hyperf.log';
        $logger->pushHandler(new StreamHandler($logFile, 100));
        $app->set(LoggerInterface::class, $logger);
    }
}
