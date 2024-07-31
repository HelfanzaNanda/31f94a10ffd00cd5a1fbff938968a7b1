<?php

namespace App;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name:"oauth_jti")]
class OAuthJti
{
    #[ORM\Id]
    #[ORM\Column(type:"string", length:80)]
    private $issuer;

    #[ORM\Column(type:"string", length:80, nullable:true)]
    private $subject;

    #[ORM\Column(type:"string", length:80, nullable:true)]
    private $audience;

    #[ORM\Column(type:"datetime")]
    private $expires;

    #[ORM\Column(type:"string", length:2000)]
    private $jti;

    public function getIssuer()
    {
        return $this->issuer;
    }

    public function setIssuer($issuer)
    {
        $this->issuer = $issuer;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function getAudience()
    {
        return $this->audience;
    }

    public function setAudience($audience)
    {
        $this->audience = $audience;
    }

    public function getExpires()
    {
        return $this->expires;
    }

    public function setExpires($expires)
    {
        $this->expires = $expires;
    }

    public function getJti()
    {
        return $this->jti;
    }

    public function setJti($jti)
    {
        $this->jti = $jti;
    }
}
