<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JourneeSecteur
 *
 * @ORM\Table(name="journee_secteur")
 * @ORM\Entity(repositoryClass="FrontBundle\Repository\JourneeSecteurRepository")
 */
class JourneeSecteur
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
     * @ORM\Column(name="date", type="string", nullable=true)
     */
    private $date;

    /**
     * @var string
     * @ORM\Column(name="creneau", type="string", nullable=true)
     */
    private $creneau;

    /**
     * @var string
     * @ORM\Column(name="secteur", type="string", nullable=true)
     */
    private $secteur;

    /**
     * @var string
     * @ORM\Column(name="places", type="string", nullable=true)
     */
    private $places;

    /**
     * @ORM\ManyToOne(targetEntity="FrontBundle\Entity\Sejour", inversedBy="journeeSecteur")
     * @ORM\JoinColumn(name="sejour_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $sejour;

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
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getCreneau()
    {
        return $this->creneau;
    }

    /**
     * @param string $creneau
     */
    public function setCreneau($creneau)
    {
        $this->creneau = $creneau;
    }

    /**
     * @return string
     */
    public function getSecteur()
    {
        return $this->secteur;
    }

    /**
     * @param string $secteur
     */
    public function setSecteur($secteur)
    {
        $this->secteur = $secteur;
    }

    /**
     * @return int
     */
    public function getPlaces()
    {
        return $this->places;
    }

    /**
     * @param int $places
     */
    public function setPlaces($places)
    {
        $this->places = $places;
    }

    /**
     * @return mixed
     */
    public function getSejour()
    {
        return $this->sejour;
    }

    /**
     * @param mixed $sejour
     */
    public function setSejour($sejour)
    {
        $this->sejour = $sejour;
    }


}

