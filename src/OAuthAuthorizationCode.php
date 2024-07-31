<?php

namespace App;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Serializable;

#[ORM\Entity]
#[ORM\Table(name:"oauth_authorization_codes")]
class OAuthAuthorizationCode
{
    #[ORM\Id]
    #[ORM\Column(type:"string", length:40)]
    private $authorizationCode;

    #[ORM\Column(type:"string", name:"client_id", length:80)]
    private $clientId;

    #[ORM\Column(type:"string", name:"user_id", length:80, nullable:true)]
    private $userId;

    #[ORM\Column(type:"string", name:"redirect_uri", length:2000, nullable:true)]
    private $redirectUri;

    #[ORM\Column(type:"datetime")]
    private $expires;

    #[ORM\Column(type:"string", length:4000, nullable:true)]
    private $scope;

    #[ORM\Column(type:"string", name:"id_token", length:1000, nullable:true)]
    private $idToken;

    public function getAuthorizationCode()
    {
        return $this->authorizationCode;
    }

    public function setAuthorizationCode($authorizationCode)
    {
        $this->authorizationCode = $authorizationCode;
    }

    public function getClientId()
    {
        return $this->clientId;
    }

    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getRedirectUri()
    {
        return $this->redirectUri;
    }

    public function setRedirectUri($redirectUri)
    {
        $this->redirectUri = $redirectUri;
    }

    public function getExpires()
    {
        return $this->expires;
    }

    public function setExpires($expires)
    {
        $this->expires = $expires;
    }

    public function getScope()
    {
        return $this->scope;
    }

    public function setScope($scope)
    {
        $this->scope = $scope;
    }

    public function getIdToken()
    {
        return $this->idToken;
    }

    public function setIdToken($idToken)
    {
        $this->idToken = $idToken;
    }
}
