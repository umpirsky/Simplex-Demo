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

$config = \Symfony\Component\Yaml\Yaml::parse(__DIR__ . '/../config/app.yml');
$config['twig.path'] = __DIR__ . '/../' . $config['twig.path']; // TODO: add application path as parameter in Simplex\Application

$app = new Simplex\Application($config);

// Add pages
foreach (array(
    'home' => '/',
    'about' => '/about'
) as $route => $url) {
    $app->get($url, function () use ($app, $route) {
        return $app['twig']->render($route . '.html.twig');
    })->bind($route);
}

return $app;
