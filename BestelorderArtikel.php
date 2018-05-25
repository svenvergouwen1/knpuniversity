<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="order_artikelen")
 */
class BestelorderArtikel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Bestelorder", inversedBy="bestelorderArtikelen")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bestelorder;

    /**
     * @ORM\ManyToOne(targetEntity="Artikel", inversedBy="orderArtikelen")
     * @ORM\JoinColumn(nullable=false)
     */
    private $artikel;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $aantal;


    public function getId()
    {
        return $this->id;
    }

    public function setBestelorder($bestelorder)
    {
        $this->bestelorder = $bestelorder;
    }

    public function getBestelorder()
    {
        return $this->bestelorder;
    }

    public function getArtikel()
    {
        return $this->artikel;
    }
    public function setArtikel($artikel)
    {
        $this->artikel = $artikel;
    }
    public function getAantal()
    {
        return $this->aantal;
    }
    public function setAantal($aantal)
    {
        $this->aantal = $aantal;
    }
}