<?php

namespace App;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name:"oauth_public_keys")]
class OAuthPublicKey
{
    #[ORM\Id]
    #[ORM\Column(type:"string", name:"client_id", length:80)]
    private $clientId;

    #[ORM\Column(type:"string", name:"public_key", length:2000)]
    private $publicKey;

    #[ORM\Column(type:"string", name:"private_key", length:2000)]
    private $privateKey;

    #[ORM\Column(type:"string", name:"encryption_algorithm", length:100, options:["default"=>"RS256"])]
    private $encryptionAlgorithm;

    public function getClientId()
    {
        return $this->clientId;
    }

    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    public function getPublicKey()
    {
        return $this->publicKey;
    }

    public function setPublicKey($publicKey)
    {
        $this->publicKey = $publicKey;
    }

    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    public function setPrivateKey($privateKey)
    {
        $this->privateKey = $privateKey;
    }

    public function getEncryptionAlgorithm()
    {
        return $this->encryptionAlgorithm;
    }

    public function setEncryptionAlgorithm($encryptionAlgorithm)
    {
        $this->encryptionAlgorithm = $encryptionAlgorithm;
    }
}
