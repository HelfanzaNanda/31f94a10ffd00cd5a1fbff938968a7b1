<?php

namespace App;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Serializable;

#[ORM\Entity]
#[ORM\Table(name:"oauth_clients")]
class OAuthClient
{
    #[ORM\Id]
    #[ORM\Column(type:"string", name:"client_id", length:80)]
    private $clientId;

    #[ORM\Column(type:"string", name:"client_secret", length:80, nullable:true)]
    private $clientSecret;

    #[ORM\Column(type:"string", name:"redirect_uri", length:2000, nullable:true)]
    private $redirectUri;

    #[ORM\Column(type:"string", name:"grant_types", length:80, nullable:true)]
    private $grantTypes;

    #[ORM\Column(type:"string", length:4000, nullable:true)]
    private $scope;

    #[ORM\Column(type:"string", name:"user_id", length:80, nullable:true)]
    private $userId;

    public function getClientId()
    {
        return $this->clientId;
    }

    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;
    }

    public function getRedirectUri()
    {
        return $this->redirectUri;
    }

    public function setRedirectUri($redirectUri)
    {
        $this->redirectUri = $redirectUri;
    }

    public function getGrantTypes()
    {
        return $this->grantTypes;
    }

    public function setGrantTypes($grantTypes)
    {
        $this->grantTypes = $grantTypes;
    }

    public function getScope()
    {
        return $this->scope;
    }

    public function setScope($scope)
    {
        $this->scope = $scope;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
}
