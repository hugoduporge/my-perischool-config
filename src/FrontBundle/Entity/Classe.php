<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FrontBundle\Traits\UcFirstUtf8;

/**
 * Classe.

 * @ORM\Table(name="Classe")
 * @ORM\Entity(repositoryClass="FrontBundle\Repository\ClasseRepository")
 */
class Classe
{
    use UcFirstUtf8;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50, nullable=true)
     */
    private $nom;
    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom.
     *
     * @param string $nom
     *
     * @return Classe
     */
    public function setNom($nom)
    {
        $this->nom = $this->ucfirstUtf8($nom);

        return $this;
    }

    /**
     * Get nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }


}
