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

$app = new Simplex\Application(array(
    'twig.path' => __DIR__ . '/../views'
));

// Add pages
foreach (array(
    'home' => '/',
    'test' => '/test'
) as $route => $url) {
    $app->get($url, function () use ($app, $route) {
        return $app['twig']->render($route . '.html.twig');
    })->bind($route);
}

return $app;
