<?php
namespace Depa\Logger;

use Interop\Container\ContainerInterface;


class LoggerMiddlewareFactory
{
    public function __invoke(ContainerInterface $container)
    {


        return new LoggerMiddleware();
    }
}
