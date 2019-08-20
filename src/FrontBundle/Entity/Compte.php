<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Compte
 *
 * @ORM\Table(name="Compte")
 * @ORM\Entity(repositoryClass="FrontBundle\Repository\CompteRepository")
 */
class Compte
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
     * @var int
     *
     * @ORM\Column(name="id_commune", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idCommune;

    /**
     * @var int
     *
     * @ORM\Column(name="id_activite", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idActivite;

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
     * @return int
     */
    public function getIdCommune()
    {
        return $this->idCommune;
    }

    /**
     * @param int $idCommune
     */
    public function setIdCommune($idCommune)
    {
        $this->idCommune = $idCommune;
    }

    /**
     * @return int
     */
    public function getIdActivite()
    {
        return $this->idActivite;
    }

    /**
     * @param int $idActivite
     */
    public function setIdActivite($idActivite)
    {
        $this->idActivite = $idActivite;
    }


}

