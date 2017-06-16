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
         
         if (!isset($config['logger'])) {
//              $sessionManager = new SessionManager();
//              Container::setDefaultManager($sessionManager);
//              return $sessionManager;
         }
         
         
         //$PsrLogger = (new \Depa\MiddlewareLogger\Logger\NullLogger())->getLogger();
         $PsrLogger = (new \Depa\MiddlewareLogger\Logger\ChromePhpLogger())->getLogger();

         $log = new Logger($PsrLogger);
         
         return ($log);
        
    }

    
    
}