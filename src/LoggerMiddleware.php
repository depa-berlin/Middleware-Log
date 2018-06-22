<?php
namespace Depa\MiddlewareLogger;

use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface;

class LoggerMiddleware implements MiddlewareInterface
{
    private $zendLogger;
    
    public function __construct( $logger)
    {
        $this->zendLogger = $logger;
    }
    
    /**
     * {@inheritDoc}
     * 
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);
        return $response;
    }    
}