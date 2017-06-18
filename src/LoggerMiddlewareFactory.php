<?php
namespace Depa\MiddlewareLogger;

use Interop\Container\ContainerInterface;

class LoggerMiddlewareFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $logger = $container->get(Logger::class);
        return new LoggerMiddleware($logger);
    }
}
