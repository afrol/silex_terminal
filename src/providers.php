<?php

use Silex\Provider\{
    TwigServiceProvider,
    DoctrineServiceProvider
};

// Template system definition.
$app->register(new TwigServiceProvider(), [
    'twig.path' => [PATH_VIEWS]
]);

if (!empty($app['db.options'])) {
    $app->register(new DoctrineServiceProvider(), ['db.options' => $app['db.options']]);
}

return $app;
