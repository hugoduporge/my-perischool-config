<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Critere.
 *
 * @ORM\Table(name="critere")
 * @ORM\Entity(repositoryClass="FrontBundle\Repository\CritereRepository")
 */
class Critere
{
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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var array
     *
     * @ORM\Column(name="operateurs_disponibles", type="array")
     */
    private $operateursDisponibles;

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
     * Set libelle.
     *
     * @param string $libelle
     *
     * @return Critere
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle.
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set operateursDisponibles.
     *
     * @param array $operateursDisponibles
     *
     * @return Critere
     */
    public function setOperateursDisponibles($operateursDisponibles)
    {
        $this->operateursDisponibles = $operateursDisponibles;

        return $this;
    }

    /**
     * Get operateursDisponibles.
     *
     * @return array
     */
    public function getOperateursDisponibles()
    {
        return $this->operateursDisponibles;
    }
}
