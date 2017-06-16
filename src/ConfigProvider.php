<?php

namespace Depa\MiddlewareLogger;






/**
 * The configuration provider for the Core module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
        ];
    }

    /**
     * Returns the container dependencies
     *
     * @return array
     */
    public function getDependencies()
    { 
        return [
            'invokables' => [
            ],
            'factories'  => [
                \Depa\MiddlewareLogger\Logger::class => \Depa\MiddlewareLogger\LoggerFactory::class,
                \Depa\MiddlewareLogger\LoggerMiddleware::class => \Depa\MiddlewareLogger\LoggerMiddlewareFactory::class,
                
                 
            ],
        ];
    }

    /**
     * Returns the templates configuration
     *
     * @return array
     */
    public function getTemplates()
    {
        return [
            'paths' => [
                'app'    => [__DIR__ . '/../templates/app'],
                'error'  => [__DIR__ . '/../templates/error'],
                'layout' => [__DIR__ . '/../templates/layout'],
            ],
        ];
    }
}
