<?php
namespace Depa\Logger;

use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Log\Logger;

class LoggerFactory implements FactoryInterface{
    /**
     * {@inheritDoc}
     * @see \Zend\ServiceManager\Factory\FactoryInterface::__invoke()
     */
    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
         $config = $container->get('config');
         
         if (!isset($config['logger'])) {
//              $sessionManager = new SessionManager();
//              Container::setDefaultManager($sessionManager);
//              return $sessionManager;
         }
         
         $loggerConfigArray = $config['logger'];
         
         $zendLogLogger = new Logger();
         $zendLogLogger->addWriter(new Stream($fileName));
        
    }

    
    
}