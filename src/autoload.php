<?php

/*
* This file is part of the Simplex-Demo.
*
* (c) Саша Стаменковић <umpirsky@gmail.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

if (false === class_exists('Symfony\Component\ClassLoader\UniversalClassLoader', false)) {
    require_once __DIR__ . '/../vendor/simplex/vendor/silex/vendor/Symfony/Component/ClassLoader/UniversalClassLoader.php';
}

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespaces(array(
    'Symfony'   => array(__DIR__ . '/../vendor/simplex/vendor/silex/vendor', __DIR__ . '/../vendor'),
    'Silex'     => __DIR__ . '/../vendor/simplex/vendor/silex/src',
    'Simplex'   => __DIR__ . '/../vendor/simplex/src',
    'Knp'       => __DIR__ . '/../vendor/simplex/vendor/KnpMenu/src',
));
$loader->registerPrefixes(array(
    'Pimple'    => __DIR__ . '/../vendor/simplex/vendor/silex/vendor/pimple/lib',
));
$loader->register();