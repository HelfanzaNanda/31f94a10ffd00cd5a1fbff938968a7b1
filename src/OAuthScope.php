<?php

namespace App;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name:'oauth_scopes')]
class OAuthScope
{
    #[ORM\Id]
    #[ORM\Column(type:"string", length:80)]
    private $scope;

    #[ORM\Column(type:"boolean", name:"is_default", nullable:true)]
    private $isDefault;

    public function getScope()
    {
        return $this->scope;
    }

    public function setScope($scope)
    {
        $this->scope = $scope;
    }

    public function getIsDefault()
    {
        return $this->isDefault;
    }

    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;
    }
}
