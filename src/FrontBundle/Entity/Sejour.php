<?php

namespace FrontBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass="FrontBundle\Repository\SejourRepository")
 * @Serializer\ExclusionPolicy("all")
 */
class Sejour
{
    /**
     * @var int
     * @ORM\GeneratedValue()
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @var string
     * @ORM\Column(name="libelle", type="string", length=50 , nullable=true)
     */
    private $libelle;

    /**
     * @var integer
     * @ORM\Column(name="id_commune", type="integer", length=50 , nullable=true)
     */
    private $idCommune;

    /**
     * @var integer
     * @ORM\Column(name="id_user", type="integer", length=50 , nullable=true)
     */
    private $idUser;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_debut", type="datetime", nullable=true, options={"default" : null} )
     * @Serializer\Expose()

     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="datetime", nullable=true, options={"default" : null})
     * @Serializer\Expose()

     */
    private $dateFin;

    /**
     * @var bool
     *
     * @ORM\Column(name="inscription_matin", type="boolean", nullable=true)
     */
    private $inscriptionMatin;

    /**
     * @var bool
     *
     * @ORM\Column(name="inscription_apres_midi", type="boolean", nullable=true)
     */
    private $inscriptionApresMidi;

    /**
     * @var bool
     *
     * @ORM\Column(name="inscription_journee", type="boolean", nullable=true)
     */
    private $inscriptionJournee;

    /**
     * @var bool
     *
     * @ORM\Column(name="bus", type="boolean", options={"default" : true},nullable =true)
     */
    private $bus;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_debut_inscriptions_interne", type="datetime", nullable=true, options={"default" : null})
     */
    private $dateDebutInscriptionsInterne;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_debut_inscriptions_externe", type="datetime", nullable=true, options={"default" : null})
     */
    private $dateDebutInscriptionsExterne = null;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_fin_inscriptions", type="datetime", nullable=true, options={"default" : null})
     */
    private $dateFinInscriptions;
    /**
     * @var bool
     *
     * @ORM\Column(name="visible",type="boolean",options={"default" : true}, nullable=false)
     */
    private $visible = true;
    /**
     * @return string
     */
    /**
     * @var bool
     *
     * @ORM\Column(name="use_credit_note",type="boolean",options={"default" : true}, nullable=false)
     */
    private $useCreditNote = true;
    /**
     * @var bool
     *
     * @ORM\Column(name="paiement_mensuel", type="boolean",  options={"default" : false}, nullable=true)
     * @Serializer\Expose()
     */
    private $paiementMensuel;
    /**
     * @var bool
     *
     * @ORM\Column(name="paiement_plusieurs_fois", type="boolean", options={"default" : false}, nullable=true)
     * @Serializer\Expose()
     */
    private $paiementPlusieursFois = false;
    /**
     * @var int
     *
     * @ORM\Column(name="nb_paiement_plusieurs_fois", type="integer", nullable=true)
     * @Serializer\Expose()
     */
    private $nbPaiementPlusieursFois = null;
    /**
     * @var int
     *
     * @ORM\Column(name="demi_journees_atl", type="integer", nullable=true)
     * @Serializer\Expose()
     */
    private $demiJourneesATL = null;
    /**
     * @ORM\OneToMany(targetEntity="FrontBundle\Entity\Bus", mappedBy="sejour")
     */
    private $busM;
    /**
     * @ORM\OneToMany(targetEntity="FrontBundle\Entity\Restriction", mappedBy="sejour")
     */
    private $restrictions;

    /**
     * @ORM\OneToMany(targetEntity="FrontBundle\Entity\VillePartenaire", mappedBy="sejour")
     */
    private $villePartenaire;
    /**
     * @var bool
     *
     * @ORM\Column(name="aide_au_temps_libre", type="boolean",  options={"default" : false}, nullable=true)
     * @Serializer\Expose()
     */
    private $atl;

    /**
     * @var string
     *
     * @ORM\Column(name="montant_aide_au_temps_libre", type="float", nullable=true)
     * @Serializer\Expose()
     */
    private $montantAideAuTempsLibre;
    /**
     * @ORM\OneToMany(targetEntity="FrontBundle\Entity\JourneeSecteur", mappedBy="sejour")
     */
    private $journeeSecteur;
    /**
     * @return mixed
     */
    public function getBusM()
    {
        return $this->busM;
    }

    /**
     * @param mixed $busM
     */
    public function setBusM($busM)
    {
        $this->busM = $busM;
    }

    /**
     * @return bool
     */
    public function isAtl()
    {
        return $this->atl;
    }

    /**
     * @param bool $atl
     */
    public function setAtl($atl)
    {
        $this->atl = $atl;
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
    public function setLibelle(string $libelle)
    {
        $this->libelle = $libelle;
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
    public function setIdCommune(int $idCommune)
    {
        $this->idCommune = $idCommune;
    }

    /**
     * @return int
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param int $idUser
     */
    public function setIdUser(int $idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return int
     */
    public function getId(){
        return $this->id;
    }
    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * @param DateTime $dateDebut
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @param DateTime $dateFin
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    }

    /**
     * @return bool
     */
    public function isInscriptionMatin()
    {
        return $this->inscriptionMatin;
    }

    /**
     * @param bool $inscriptionMatin
     */
    public function setInscriptionMatin($inscriptionMatin)
    {
        $this->inscriptionMatin = $inscriptionMatin;
    }

    /**
     * @return bool
     */
    public function isInscriptionApresMidi()
    {
        return $this->inscriptionApresMidi;
    }

    /**
     * @param bool $inscriptionApresMidi
     */
    public function setInscriptionApresMidi($inscriptionApresMidi)
    {
        $this->inscriptionApresMidi = $inscriptionApresMidi;
    }

    /**
     * @return bool
     */
    public function isInscriptionJournee()
    {
        return $this->inscriptionJournee;
    }

    /**
     * @param bool $inscriptionJournee
     */
    public function setInscriptionJournee($inscriptionJournee)
    {
        $this->inscriptionJournee = $inscriptionJournee;
    }

    /**
     * @return bool
     */
    public function isBus()
    {
        return $this->bus;
    }

    /**
     * @param bool $bus
     */
    public function setBus($bus)
    {
        $this->bus = $bus;
    }

    /**
     * @return DateTime
     */
    public function getDateDebutInscriptionsInterne()
    {
        return $this->dateDebutInscriptionsInterne;
    }

    /**
     * @param DateTime $dateDebutInscriptionsInterne
     */
    public function setDateDebutInscriptionsInterne($dateDebutInscriptionsInterne)
    {
        $this->dateDebutInscriptionsInterne = $dateDebutInscriptionsInterne;
    }

    /**
     * @return DateTime
     */
    public function getDateDebutInscriptionsExterne()
    {
        return $this->dateDebutInscriptionsExterne;
    }

    /**
     * @param DateTime $dateDebutInscriptionsExterne
     */
    public function setDateDebutInscriptionsExterne($dateDebutInscriptionsExterne)
    {
        $this->dateDebutInscriptionsExterne = $dateDebutInscriptionsExterne;
    }

    /**
     * @return DateTime
     */
    public function getDateFinInscriptions()
    {
        return $this->dateFinInscriptions;
    }

    /**
     * @param DateTime $dateFinInscriptions
     */
    public function setDateFinInscriptions($dateFinInscriptions)
    {
        $this->dateFinInscriptions = $dateFinInscriptions;
    }

    /**
     * @return bool
     */
    public function isVisible()
    {
        return $this->visible;
    }

    /**
     * @param bool $visible
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;
    }

    /**
     * @return bool
     */
    public function isUseCreditNote()
    {
        return $this->useCreditNote;
    }

    /**
     * @param bool $useCreditNote
     */
    public function setUseCreditNote($useCreditNote)
    {
        $this->useCreditNote = $useCreditNote;
    }

    /**
     * @return bool
     */
    public function isPaiementMensuel()
    {
        return $this->paiementMensuel;
    }

    /**
     * @param bool $paiementMensuel
     */
    public function setPaiementMensuel($paiementMensuel)
    {
        $this->paiementMensuel = $paiementMensuel;
    }

    /**
     * @return bool
     */
    public function isPaiementPlusieursFois()
    {
        return $this->paiementPlusieursFois;
    }

    /**
     * @param bool $paiementPlusieursFois
     */
    public function setPaiementPlusieursFois($paiementPlusieursFois)
    {
        $this->paiementPlusieursFois = $paiementPlusieursFois;
    }

    /**
     * @return int
     */
    public function getNbPaiementPlusieursFois()
    {
        return $this->nbPaiementPlusieursFois;
    }

    /**
     * @param int $nbPaiementPlusieursFois
     */
    public function setNbPaiementPlusieursFois($nbPaiementPlusieursFois)
    {
        $this->nbPaiementPlusieursFois = $nbPaiementPlusieursFois;
    }

    /**
     * @return int
     */
    public function getDemiJourneesATL()
    {
        return $this->demiJourneesATL;
    }

    /**
     * @param int $demiJourneesATL
     */
    public function setDemiJourneesATL($demiJourneesATL)
    {
        $this->demiJourneesATL = $demiJourneesATL;
    }

    /**
     * @return string
     */
    public function getMontantAideAuTempsLibre()
    {
        return $this->montantAideAuTempsLibre;
    }

    /**
     * @param string $montantAideAuTempsLibre
     */
    public function setMontantAideAuTempsLibre($montantAideAuTempsLibre)
    {
        $this->montantAideAuTempsLibre = $montantAideAuTempsLibre;
    }

}
