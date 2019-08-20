<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;


/**
 * Secteur
 *
 * @ORM\Table(name="secteur")
 * @ORM\Entity(repositoryClass="FrontBundle\Repository\SecteurRepository")
 */
class Secteur
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Expose()
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     * @Serializer\Expose()
     */
    private $libelle;

    /**
     * @var int
     *
     * @ORM\Column(name="nbPlaces", type="integer")
     * @Serializer\Expose()
     */
    private $nbPlaces;

    /**
     * @var int
     *
     * @ORM\Column(name="ageMin", type="integer")
     * @Serializer\Expose()
     */
    private $ageMin;

    /**
     * @var string
     *
     * @ORM\Column(name="ageMax", type="integer")
     * @Serializer\Expose()
     */
    private $ageMax;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return int
     */
    public function getNbPlaces()
    {
        return $this->nbPlaces;
    }

    /**
     * @param int $nbPlaces
     */
    public function setNbPlaces($nbPlaces)
    {
        $this->nbPlaces = $nbPlaces;
    }

    /**
     * @return int
     */
    public function getAgeMin()
    {
        return $this->ageMin;
    }

    /**
     * @param int $ageMin
     */
    public function setAgeMin($ageMin)
    {
        $this->ageMin = $ageMin;
    }

    /**
     * @return string
     */
    public function getAgeMax()
    {
        return $this->ageMax;
    }

    /**
     * @param string $ageMax
     */
    public function setAgeMax($ageMax)
    {
        $this->ageMax = $ageMax;
    }

}

