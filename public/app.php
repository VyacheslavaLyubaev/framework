<?php

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;



function is_leap_year($year = null) {
    if (null === $year) {
        $year = date('Y');
    }

    return 0 === $year % 400 || (0 === $year % 4 && 0 !== $year % 100);
}

$routes = new Routing\RouteCollection();

$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', array(
    'year' => null,
    '_controller' => function ($request) {
        if (is_leap_year($request->attributes->get('year'))) {
            return new Response('Yep, this is a leap year!');
        }

        return new Response('Nope, this is not a leap year.');
    }
)));


$routes->add('hello', new Routing\Route('/hello/{name}', array(
    'name' => 'World',
    '_controller' => 'render_template',
)));

$routes->add('bye', new Routing\Route('/bye/{name}', array(
    'name' => 'World',
    '_controller' => 'render_template',
)));


return $routes;