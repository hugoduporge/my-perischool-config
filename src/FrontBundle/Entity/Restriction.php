<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Restriction
 *
 * @ORM\Table(name="restriction")
 * @ORM\Entity(repositoryClass="FrontBundle\Repository\RestrictionRepository")
 */
class Restriction
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
     *
     * @ORM\Column(name="valeur", type="string", length=255)
     */
    private $valeur;

    /**
     * @ORM\ManyToOne(targetEntity="FrontBundle\Entity\Critere")
     * @ORM\JoinColumn(name="critere_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $critere;

    /**
     * @var string
     *
     * @ORM\Column(name="operateur", type="string", length=255)
     */
    private $operateur;
    /**
     * @var Sejour
     *
     * @ORM\ManyToOne(targetEntity="FrontBundle\Entity\Sejour",inversedBy="restrictions")
     * @ORM\JoinColumn(name="sejour_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $sejour;
    /**
     * Get id
     *
     * @return int
     */

    /**
     * @var string
     *
     * @ORM\Column(name="critereval", type="string", length=255)
     */
    private $critereval;

    /**
     * @return int
     * @ORM\Column(name="critere_index", type="integer", nullable=true)
     */

    private $critereIndex;

    /**
     * @return int
     * @ORM\Column(name="operateur_index", type="integer", nullable=true)
     */

    private $operateurIndex;

    /**
     * @return int
     * @ORM\Column(name="valeur_index", type="integer", nullable=true)
     */

    private $valeurIndex;



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
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * @param string $valeur
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;
    }

    /**
     * @return mixed
     */
    public function getCritere()
    {
        return $this->critere;
    }

    /**
     * @param mixed $critere
     */
    public function setCritere($critere)
    {
        $this->critere = $critere;
    }

    /**
     * @return string
     */
    public function getOperateur()
    {
        return $this->operateur;
    }

    /**
     * @param string $operateur
     */
    public function setOperateur($operateur)
    {
        $this->operateur = $operateur;
    }

    /**
     * @return Sejour
     */
    public function getSejour()
    {
        return $this->sejour;
    }


    public function setSejour($sejour)
    {
        $this->sejour = $sejour;

        return $this;
    }

    /**
     * @return string
     */
    public function getCritereval()
    {
        return $this->critereval;
    }

    /**
     * @param string $critereval
     */
    public function setCritereval($critereval)
    {
        $this->critereval = $critereval;
    }

    /**
     * @return mixed
     */
    public function getCritereIndex()
    {
        return $this->critereIndex;
    }

    /**
     * @param mixed $critereIndex
     */
    public function setCritereIndex($critereIndex): void
    {
        $this->critereIndex = $critereIndex;
    }




}

