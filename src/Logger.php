<?php
namespace Depa\MiddlewareLogger;

use Psr\Log\LoggerInterface;

class Logger
{

    public static $staticLogger;
    public $logger;

    public function __construct(LoggerInterface $logger)
    {
        self::$staticLogger = $logger;
        $this->logger = $logger;
    }

    public function __call($name, $arguments)
    {
        $argumentsArray = implode(', ', $arguments);
        if($name == 'log'){
            $argumentsArray[1] = self::prepearObject($argumentsArray[1]);
        }
        else{
            $argumentsArray[0] = self::prepearObject($argumentsArray[0]);
        }
        switch (count($argumentsArray)) {
            case 1:
                $this->logger->$name($argumentsArray[0]);
                break;
            case 1:
                $this->logger->$name($argumentsArray[0], $argumentsArray[1]);
                break;
            case 1:
                $this->logger->$name($argumentsArray[0], $argumentsArray[1], $argumentsArray[2]);
                break;
        }
    }


    public static function __callStatic($name, $arguments)
    {
        $argumentsArray = implode(', ', $arguments);
        if($name == 'log'){
            $argumentsArray[1] = self::prepearObject($argumentsArray[1]);
        }
        else{
            $argumentsArray[0] = self::prepearObject($argumentsArray[0]);
        }
        switch (count($argumentsArray)) {
            case 1:
                self::$staticLogger->$name($argumentsArray[0]);
                break;
            case 1:
                self::$staticLogger->$name($argumentsArray[0], $argumentsArray[1]);
                break;
            case 1:
                self::$staticLogger->$name($argumentsArray[0], $argumentsArray[1], $argumentsArray[2]);
                break;
        }
    }
    
    private static function prepearObject($obj){
        if(!is_object($obj))
        {
            return $obj;
        }
        $ret = [];
        $ret[get_class($obj)] = [];
        foreach (get_object_vars($obj) as $name => $content) {
            if (!is_object($content)) {
                $ret[$name] = ['type' => gettype($content), 'content' => $content];
            } else {
                $ret[$name] = ['type' => gettype($content), 'class' => get_class($content)];
            }
        }
        return $ret;
    }
    
}