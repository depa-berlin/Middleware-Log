<?php
namespace Depa\MiddlewareLogger;

use Psr\Log\LoggerInterface;

class Logger{
    
    static public $logger;    
    
    public function __construct(LoggerInterface $logger)
    {
        self::$logger = $logger; 
    }
    

    
    public function __call($name, $arguments){
        $this->logger->$name($arguments);
    }
    
    public static function __callStatic($name, $arguments)
    {
        self::$logger->$name($arguments);
    }
}