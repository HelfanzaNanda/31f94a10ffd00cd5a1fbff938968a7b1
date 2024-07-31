<?php
namespace App\Middlewares;

use App\OAuth\Oauth;
use OAuth2\Request as OAuth2Request;
use OAuth2\Response as OAuth2Response;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class OAuthMiddleware implements IMiddleware
{
    public function handle(Request $request) : void
    {
        $oAuth2Request = OAuth2Request::createFromGlobals();
        $oAuth2response = new OAuth2Response();

        $oauth = new Oauth();
        if (!$oauth->server->verifyResourceRequest($oAuth2Request, $oAuth2response)) {
            $oauth->server->getResponse()->send();
            die;
        }
    }
}
