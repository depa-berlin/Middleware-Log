<?php
namespace Depa\Logger\Logger;

use Zend\Log\Logger;
use Zend\Log\PsrLoggerAdapter;

class ChromePhpLogger
{
    public function __construct()
    {
        $logger = new Logger();
        $logger->addWriter(new \Zend\Log\Writer\ChromePHP());
        $PsrLogger = new PsrLoggerAdapter($logger);
        return ($PsrLogger);
    }
} 