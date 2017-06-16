<?php
namespace Depa\Logger;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Log\Logger;
use Zend\Log\PsrLoggerAdapter;


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
         
         $loggerConfigArray = $config['logger'];
         
         $zendLogLogger = new Logger();
         $wr = new \Zend\Log\Writer\FirePHP();
         
         new \Zend\Log\Writer\Noop();
         $zendLogLogger->addWriter($wr);
         
         $PsrLogger = new PsrLoggerAdapter($logger);
         
         return ($PsrLogger);
        
    }

    
    
}