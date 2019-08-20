<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bus
 *
 * @ORM\Table(name="bus")
 * @ORM\Entity(repositoryClass="FrontBundle\Repository\BusRepository")
 */
class Bus
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string
     * @ORM\Column(name="libelle", type="string", nullable=true , options={"default": null})
     */
    private $libelle;
    /**
     * @var string
     * @ORM\Column(name="hour", type="string", nullable=true)
     */
    private $heure;

    /**
     * @ORM\ManyToOne(targetEntity="FrontBundle\Entity\Sejour", inversedBy="busM")
     * @ORM\JoinColumn(name="sejour_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $sejour;
    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setSejour($sejour)
    {
        $this->sejour = $sejour;

        return $this;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param string $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }


    /**
     * @return string
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * @param string $heure
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;
    }

}

