<?php

namespace App;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name:"oauth_jwt")]
class OauthJwt
{
    #[ORM\Id]
    #[ORM\Column(type:"string", length:80)]
    private $clientId;

    #[ORM\Column(type:"string", length:80, nullable:true)]
    private $subject;

    #[ORM\Column(type:"string", name:"public_key", length:2000)]
    private $publicKey;

    public function getClientId()
    {
        return $this->clientId;
    }

    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function getPublicKey()
    {
        return $this->publicKey;
    }

    public function setPublicKey($publicKey)
    {
        $this->publicKey = $publicKey;
    }
}
