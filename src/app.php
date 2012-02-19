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

$navigation = \Symfony\Component\Yaml\Yaml::parse(__DIR__ . '/../config/navigation.yml');
return new Simplex\Application(array_merge(
    array('navigation' => $navigation),
    \Symfony\Component\Yaml\Yaml::parse(__DIR__ . '/../config/app.yml')
));
