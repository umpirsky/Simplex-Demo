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
$navigation = \Symfony\Component\Yaml\Yaml::parse(__DIR__ . '/../config/navigation.yml');
$app->addNavigation($navigation);
$app->addPages($navigation);

return $app;
