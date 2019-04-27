<?php

declare(strict_types=1);

use Slim\Container;
use Zend\ConfigAggregator\ConfigAggregator;
use Zend\ConfigAggregator\PhpFileProvider;

$aggregator = new ConfigAggregator([
    new PhpFileProvider(ROOT_DIR . '/config/common/*.php'),
    new PhpFileProvider(ROOT_DIR . '/config/' . (getenv('API_ENV') ?: 'prod') . '/*.php'),
]);

$config = $aggregator->getMergedConfig();

return new Container($config);
