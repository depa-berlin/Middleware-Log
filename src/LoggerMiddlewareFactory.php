<?php
namespace Depa\MiddlewareLogger;

use Interop\Container\ContainerInterface;


class LoggerMiddlewareFactory
{
    public function __invoke(ContainerInterface $container)
    {
$logger = $container->get(Logger::class);


/* $logger = new \Zend\Log\Logger();
$logger->addWriter(new \Zend\Log\Writer\ChromePHP());
$PsrLogger = new \Zend\Log\PsrLoggerAdapter($logger); */


        return new LoggerMiddleware($logger );
    }
}
