<?php
namespace Depa\MiddlewareLogger;

use Psr\Log\LoggerInterface;

class Logger
{
    /**
     * 
     * @var unknown Psr\Log\LoggerInterface
     */
    public static $staticLogger;
    /**
     * 
     * @var unknown Startzeit des Loggers
     */
    private static $startTime;

    public function __construct(LoggerInterface $logger)
    {
        self::$staticLogger = $logger;
        self::$startTime = microtime(true);
    }

    public function __call($name, $argumentsArray)
    {
        if($name == 'time'){
            $name = "debug";
            $info = array_key_exists(0, $argumentsArray) ? ' :' . $argumentsArray[0] : '';
            $argumentsArray[0] = 'execution time: ' . self::getExecutionTime() . $info;
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
    public static function __callStatic($name, $argumentsArray)
    {
        if($name == 'time'){
            $name = "debug";
            $info = array_key_exists(0, $argumentsArray) ? ' :' . $argumentsArray[0] : '';
            $argumentsArray[0] = 'execution time: ' . self::getExecutionTime() . $info;
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
    /**
     * Gibt bei Aufruf die aktuelle Ausführungszeit zurück
     * 
     * @return number
     */
    private static function getExecutionTime()
    {
        return (microtime(true) - self::$startTime);
    }       
}