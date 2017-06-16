<?php
namespace Depa\MiddlewareLogger\Logger;

use Zend\Log\Logger;
use Zend\Log\PsrLoggerAdapter;

class ChromePhpLogger
{
    private $logger;
    
    public function __construct()
    {
        $logger = new Logger();  
        $logger->addWriter(new \Zend\Log\Writer\ChromePHP());
        $this->logger = new PsrLoggerAdapter($logger);

    }
    
    public function getLogger()
    {
        return $this->logger;
    }
} 