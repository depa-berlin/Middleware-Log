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
        $this->zendLogger::alert("huuuuw");
        $this->zendLogger::alert("bla");
        //$this->zendLogger->alert(microtime());
        //was loggen???
        $response = $delegate->process($request);

        //$this->zendLogger->notice(array(1,2,3));
        
        //was loggen?
        return $response;

        
    }
}