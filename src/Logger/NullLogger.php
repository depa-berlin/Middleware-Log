<?php
namespace Depa\Logger\Logger;

use Zend\Log\Logger;
use Zend\Log\PsrLoggerAdapter;

class NullLogger
{
    public function __construct()
    {
        $logger = new Logger();
        $logger->addWriter(new \Zend\Log\Writer\Noop());
        $PsrLogger = new PsrLoggerAdapter($logger);
        return ($PsrLogger);
    }
} 