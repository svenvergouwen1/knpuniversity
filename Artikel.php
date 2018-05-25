<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Artikel
{
   
    /**
     * @ORM\OneToMany(targetEntity="BestelorderArtikel", mappedBy="artikel")
     */
    private $orderArtikelen;

    public function __construct()
    {
        $this->orderArtikelen = new ArrayCollection();
    }

    /**
     * @return ArrayCollection|BestelorderArtikel[]
     */
    public function getOrderArtikelen()
    {
        return $this->orderArtikelen;
    }

}

