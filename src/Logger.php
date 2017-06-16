<?php
namespace Depa\Logger;

use Psr\Log\LoggerInterface;

class Logger{
    
    public $logger;    
    
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger; 
    }
    
    
    
}