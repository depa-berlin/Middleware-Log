<?php
namespace Depa\Logger;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;





class LoggerMiddleware implements MiddlewareInterface
{
    private $zendLogger;
    
    public function __construct(LoggerInterface $logger)
    {
        $this->zendLogger = $logger;
    }
    
    /**
     * {@inheritDoc}
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        //was loggen???
        $response = $delegate->process($request);
        
        
        //was loggen?
        return $response;

        
    }
}