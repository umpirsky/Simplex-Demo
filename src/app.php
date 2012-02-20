<?php

/*
 * This file is part of the Simplex-Website.
 *
 * (c) Саша Стаменковић <umpirsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once __DIR__ . '/../vendor/simplex/autoload.php';

$app = new Simplex\Application(\Symfony\Component\Yaml\Yaml::parse(__DIR__ . '/../config/app.yml'));

// Register extensions
$app->register(new \Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../views',
    'twig.class_path' => __DIR__ . '/../vendor/simplex/vendor/silex/vendor/twig/lib'
));

$app->register(new \Silex\Provider\UrlGeneratorServiceProvider());

$navigation = \Symfony\Component\Yaml\Yaml::parse(__DIR__ . '/../config/navigation.yml');

$pages = array();
foreach ($navigation as $menu) {
    foreach ($menu['children'] as $item) {
        $pages[] = array(
            'route' => $item['route'],
            'uri' => $item['uri'],
            'view' => isset($item['view']) ? $item['view'] : $item['route']
        );
    }
}
$app->register(new \Simplex\Provider\PageServiceProvider(), array(
    'pages' => $pages
));

$app->register(new \Simplex\Provider\NavigationServiceProvider(), array(
    'navigation' => $navigation
));

 // Register error handler
$app->error(function (\Exception $e, $code) use ($app) {
    return $app['twig']->render('error.html.twig', array(
        'code' => $code,
        'exception' => $e
    ));
});

return $app;