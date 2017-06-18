<?php
namespace Depa\MiddlewareLogger;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;

class LoggerMiddleware implements MiddlewareInterface
{
    private $zendLogger;
    
    public function __construct( $logger)
    {
        $this->zendLogger = $logger;
    }
    
    /**
     * {@inheritDoc}
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $response = $delegate->process($request);
        return $response;
    }
}