<?php

use App\Handlers\CustomExceptionHandler;
use App\Middlewares\OAuthMiddleware;
use Pecee\SimpleRouter\SimpleRouter;

// SimpleRouter::csrfVerifier(new CsrfVerifierMiddleware());

SimpleRouter::setDefaultNamespace('App\\Controllers');

SimpleRouter::group(['exceptionHandler' => CustomExceptionHandler::class], function () {
    SimpleRouter::group(['prefix' => '/api'], function () {
        SimpleRouter::post('/login', 'UserController@login');
        SimpleRouter::group(['prefix' => 'user', 'middleware' => OAuthMiddleware::class], function () {
            SimpleRouter::get('/', 'UserController@index');
            SimpleRouter::post('/seed', 'UserController@seed');
            SimpleRouter::post('/send/mail', 'UserController@sendMail');
        });
    });
});
