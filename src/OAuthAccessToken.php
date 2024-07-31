<?php

namespace App;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Serializable;

#[ORM\Entity]
#[ORM\Table(name:"oauth_access_tokens")]
class OAuthAccessToken
{
    #[ORM\Id]
    #[ORM\Column(type:"string", name:"access_token", length:40)]
    private $accessToken;

    #[ORM\Column(type:"string", name:"client_id", length:80)]
    private $clientId;

    #[ORM\Column(type:"string", name:"user_id", length:80, nullable:true)]
    private $userId;

    #[ORM\Column(type:"datetime")]
    private $expires;

    #[ORM\Column(type:"string", length:4000, nullable:true)]
    private $scope;

    public function getAccessToken()
    {
        return $this->accessToken;
    }

    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
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
}
