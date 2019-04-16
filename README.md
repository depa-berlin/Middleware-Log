# MiddlewareLogger

The middleware logger is a PSR-15 middleware that provides logger functionality to a Zend Expressive application.

## Installation

Use the Composer to install the middleware.

```bash
Composer require depa/middleware-logger
```

```php
$aggregator = new ConfigAggregator([
    \Api\ConfigProvider::class,
    \Configuration\ConfigProvider::class,
    \Depa\MiddlewareLogger\ConfigProvider::class,
``` 

Füge die Middleware in der pipe.conf hinzu
```php
$app->pipe(\Depa\MiddlewareLogger\LoggerMiddleware::class);
$app->pipe(ErrorHandler::class);
```

The logger middleware needs a config file (https://github.com/depa-berlin/Middleware-Logger/blob/master/config/logger.local.php), which you add to the autoload folder:

```php
<?php
return [
    'logger' => [
        'writer' => 'ChromePhp',//Null, ChromePhp, FirePhp
    ],
];
```

## Usage

```php
use Depa\MiddlewareLogger\Logger;
```

Within a class the following logger calls can be used

```php
Logger::alert('Text');
```


## License
[MIT](https://choosealicense.com/licenses/mit/)