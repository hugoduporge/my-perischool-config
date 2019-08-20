<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TrancheQuotient
 *
 * @ORM\Table(name="tranche_quotient")
 * @ORM\Entity(repositoryClass="FrontBundle\Repository\TrancheQuotientRepository")
 */
class TrancheQuotient
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
     * @ORM\Column(name="valeur_minium", type="integer")
     */
    private $valeurMinimum;
    /**
     * @var int
     *
     * @ORM\Column(name="valeur_maximum", type="integer")
     */
    private $valeurMaximum;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string")
     */
    private $label;

    /**
     * @return int
     */
    public function getValeurMinimum()
    {
        return $this->valeurMinimum;
    }

    /**
     * @param int $valeurMinimum
     */
    public function setValeurMinimum($valeurMinimum)
    {
        $this->valeurMinimum = $valeurMinimum;
    }

    /**
     * @return int
     */
    public function getValeurMaximum()
    {
        return $this->valeurMaximum;
    }

    /**
     * @param int $valeurMaximum
     */
    public function setValeurMaximum($valeurMaximum)
    {
        $this->valeurMaximum = $valeurMaximum;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }



    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
}

