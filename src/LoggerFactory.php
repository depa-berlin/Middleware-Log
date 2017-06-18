<?php
namespace Depa\MiddlewareLogger;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class LoggerFactory implements FactoryInterface{
    /**
     * {@inheritDoc}
     * @see \Zend\ServiceManager\Factory\FactoryInterface::__invoke()
     */
    public function __invoke(ContainerInterface $container,$requestedName, array $options = null)
    {
         $config = $container->get('config');
         $loggerConfig = array_key_exists('logger', $config) ? $config['logger'] : [];
         
         $logWriter = array_key_exists('writer', $loggerConfig) ? $loggerConfig['writer'] : 'Null';
         
         $logWriter = '\\Depa\\MiddlewareLogger\\Logger\\'.$logWriter.'Logger';
        
         $PsrLogger = (new $logWriter())->getLogger();


         $log = new Logger($PsrLogger);
         
         return ($log);
        
    }
}