<?php
namespace App\Middlewares;

use Pecee\Http\Middleware\BaseCsrfVerifier;

class CsrfVerifierMiddleware extends BaseCsrfVerifier
{
    /**
     * CSRF validation will be ignored on the following urls.
     */
    // protected $except = ['/api/*'];
}
