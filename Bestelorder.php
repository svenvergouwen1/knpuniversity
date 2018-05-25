<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBunde\Entity\BestelorderArtikel;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Bestelorder
 *
 * @ORM\Table(name="bestelorder")
 * @ORM\Entity
 */
class Bestelorder
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;


    /**
     * @ORM\OneToMany(
     *     targetEntity="BestelorderArtikel",
     *     mappedBy="bestelorder",
     *     fetch="EXTRA_LAZY",
     *     orphanRemoval=true,
     *     cascade={"persist"}
     * )
     */
    public $bestelorderArtikelen;


    public function __construct()
    {
        $this->bestelorderArtikelen = new ArrayCollection();
    }

    public function addBestelorderArtikel(\AppBundle\Entity\BestelorderArtikel $bestelorderArtikel)
    {
        
        if ($this->bestelorderArtikelen->contains($bestelorderArtikel)) {
            return;
        }
        
        $this->bestelorderArtikelen[] = $bestelorderArtikel;
        $bestelorderArtikel->setBestelorder($this);        
    }

    /**
     * @return ArrayCollection|bestelorderArtikelen[]
     */
    public function getBestelorderArtikelen()
    {
        return $this->bestelorderArtikelen;
    }


}

