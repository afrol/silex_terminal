<?php

use Silex\Provider\{
    TwigServiceProvider,
    DoctrineServiceProvider,
    FormServiceProvider,
    TranslationServiceProvider
};

use Symfony\Component\Form\FormRenderer;

$app->register(new FormServiceProvider());
$app->register(new TranslationServiceProvider(), [
    'translator.domains' => [],
]);

// Template system definition.
$app->register(new TwigServiceProvider(), [
    'twig.options' => [
        'cache'	=> isset($app['twig.options.cache']) ? $app['twig.options.cache'] : false,
        'strict_variables' => true
    ],
    'twig.form.templates' => ['form_div_layout.html.twig', 'common/form_div_layout.twig'],
    'twig.path' => [PATH_VIEWS]
]);

$app->extend('twig.runtimes', function ($runtimes, $app) {
    return array_merge($runtimes, [
        FormRenderer::class => 'twig.form.renderer',
    ]);
});

if (!empty($app['db.options'])) {
    $app->register(new DoctrineServiceProvider(), ['db.options' => $app['db.options']]);
}

return $app;
