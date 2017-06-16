<?php
namespace Depa\Logger;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Log\Logger;



class LoggerFactory implements FactoryInterface{
    /**
     * {@inheritDoc}
     * @see \Zend\ServiceManager\Factory\FactoryInterface::__invoke()
     */
    public function __invoke(ContainerInterface $container)
    {
         $config = $container->get('config');
         
         if (!isset($config['logger'])) {
//              $sessionManager = new SessionManager();
//              Container::setDefaultManager($sessionManager);
//              return $sessionManager;
         }
         
         //$PsrLogger = new \Depa\Logger\Logger\NullLogger();
         $PsrLogger = new \Depa\Logger\Logger\ChromePhpLogger();
         
         return ($PsrLogger);
        
    }

    
    
}