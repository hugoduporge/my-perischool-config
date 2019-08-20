<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VillePartenaire
 *
 * @ORM\Table(name="ville_partenaire")
 * @ORM\Entity(repositoryClass="FrontBundle\Repository\VillePartenaireRepository")
 */
class VillePartenaire
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
     * @ORM\Column(name="code_postal", type="integer")
     */

    private $codePostal;
    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string")
     */
    private $ville;
    /**
     * @var Sejour
     *
     * @ORM\ManyToOne(targetEntity="FrontBundle\Entity\Sejour",inversedBy="villePartenaire")
     * @ORM\JoinColumn(name="sejour_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $sejour;
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
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * @param int $codePostal
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
    }

    /**
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param string $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return Sejour
     */
    public function getSejour()
    {
        return $this->sejour;
    }

    /**
     * @param Sejour $sejour
     */
    public function setSejour($sejour)
    {
        $this->sejour = $sejour;
    }
}

