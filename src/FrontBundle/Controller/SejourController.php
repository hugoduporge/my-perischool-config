<?php


namespace FrontBundle\Controller;

use BusinessBundle\Managers\SejourManager;
use Doctrine\DBAL\Types\DateType;
use FrontBundle\Entity\Bus;
use FrontBundle\Entity\CategorieTarif;
use FrontBundle\Entity\Classe;
use FrontBundle\Entity\Commune;
use FrontBundle\Entity\Crenaux;
use FrontBundle\Entity\Critere;
use FrontBundle\Entity\JourneeSecteur;
use FrontBundle\Entity\Restriction;
use FrontBundle\Entity\Secteur;
use FrontBundle\Entity\Sejour;
use FrontBundle\Entity\TrancheQuotient;
use FrontBundle\Entity\TypeDocument;
use FrontBundle\Entity\VillePartenaire;
use Symfony\Bridge\Monolog\Logger;
use Symfony\Component\Debug\Tests\Fixtures\LoggerThatSetAnErrorHandler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType as DateTypeAlias;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SejourController extends Controller
{
    /**
     * @Template("@Front/Sejour/sejour.html.twig")
     * @Route ("/sejours", name="sejour")
     */
    public function index(){
        $sejours= $this->getDoctrine()->getRepository(Sejour::class)->findAll();

        return ['sejours' => $sejours];
    }
    /**
     * @Template("@Front/Sejour/sejour.add.html.twig")
     * @Route ("/sejour/ajouter", name="sejour_ajouter")
     */
    public function goToAddPage(){
        $criteres= $this->getDoctrine()->getRepository(Critere::class)->findAll();
        $classes=$this->getDoctrine()->getRepository(Classe::class)->findAll();
        $typeDocument=$this->getDoctrine()->getRepository(TypeDocument::class)->findAll();
        $communes=$this->getDoctrine()->getRepository(Commune::class)->findAll();
        $secteurs= $this->getDoctrine()->getRepository(Secteur::class)->findAll();
        $crenaux=$this->getDoctrine()->getRepository(Crenaux::class)->findAll();
        $quotients=$this->getDoctrine()->getRepository(TrancheQuotient::class)->findAll();
        $categories=$this->getDoctrine()->getRepository(CategorieTarif::class)->findAll();
        return ['criteres' => $criteres,
            'classes' => $classes,
            'typesDocuments' => $typeDocument,
            'communes' => $communes,
            'secteurs' => $secteurs,
            'crenaux' => $crenaux,
            'quotients' => $quotients,
            'categories' => $categories,
        ];


    }


   /**
     * @Template("@Front/Sejour/sejour.edit.html.twig")
     * @Route("/sejour/edit/{id}", requirements={"id": "\d+"}, name ="sejour_edit")
     */
     public function editSejourAction(Request $request , $id){
         $sejour = $this->getDoctrine()->getRepository(Sejour::class)->find($id);



         $criteres= $this->getDoctrine()->getRepository(Critere::class)->findAll();
         $classes=$this->getDoctrine()->getRepository(Classe::class)->findAll();
         $typeDocument=$this->getDoctrine()->getRepository(TypeDocument::class)->findAll();
         $communes=$this->getDoctrine()->getRepository(Commune::class)->findAll();
         $secteurs= $this->getDoctrine()->getRepository(Secteur::class)->findAll();
         $crenaux=$this->getDoctrine()->getRepository(Crenaux::class)->findAll();
         $quotients=$this->getDoctrine()->getRepository(TrancheQuotient::class)->findAll();
         $categories=$this->getDoctrine()->getRepository(CategorieTarif::class)->findAll();
         return ['sejour'=>$sejour,
             'criteres' => $criteres,
             'classes' => $classes,
             'typesDocuments' => $typeDocument,
             'communes' => $communes,
             'secteurs' => $secteurs,
             'crenaux' => $crenaux,
             'quotients' => $quotients,
             'categories' => $categories,
         ];




     }


    /**
     * @Route("/sejour/add", name="sejour_add")
     * @param Request $request
     * @return RedirectResponse
     * @throws \Exception
     */
    public function addSejourAction(Request $request){

        $sejour = new Sejour();

        $libelle = $request->get('libelle');
        $dateOuverture = $request->get('dateOuverture');
        $dateFermeture = $request->get('dateFermeture');
        $dateDebutInscriptionsInterne = $request ->get('dateDebutVille');
        $dateDebutInscriptionsExterne= $request ->get('dateDebutExterieur');
        $dateFinInscriptions = $request->get('dateFinInscriptions');

        $useCreditNote = $request->get('useCreditNote');
        $visible= $request->get('visible');
        if (null != $visible) {
            $visible = true;
        }else{
            $visible=false;
        }
        if (null != $useCreditNote) {
            $useCreditNote = true;
        }else{
            $useCreditNote=false;
        }
        $paiementXFois= $request->get('paiementXFois');
        $paiementMensuel= $request->get('paiementMensuel');

        if( null == $paiementMensuel && null == $paiementXFois) {
            $sejour->setPaiementMensuel(false);
            $sejour->setPaiementPlusieursFois(false);
            $sejour->setNbPaiementPlusieursFois(null);
        }elseif (null != $paiementMensuel){
            $sejour->setPaiementMensuel(true);
            $sejour->setPaiementPlusieursFois(false);
            $sejour->setNbPaiementPlusieursFois(null);
        }elseif(null!= $paiementXFois){
            $sejour->setPaiementPlusieursFois(true);
            $sejour->setPaiementMensuel(false);
            $nbEcheanches = $request->get('nbEcheances');
            $sejour->setNbPaiementPlusieursFois($nbEcheanches);
        }

        $atl= $request->get('aideTempsLibre');

        if(null == $atl){
            $sejour->setAtl(false);
            $sejour->setMontantAideAuTempsLibre(null);
            $sejour->setDemiJourneesATL(null);

        }else{
            $sejour->setAtl(true);
            $montantAtl = $request->get('montantAtl');
            $nbDemiJoursAtl= $request->get('nbDemiJoursAtl');
            $sejour->setDemiJourneesATL($nbDemiJoursAtl);
            $sejour->setMontantAideAuTempsLibre($montantAtl);
        }


        /*PARTIE BUS*/
        $listBus= $request->get('listBusAjax');
        if(!empty($listBus)) {
            $sejour->setBus(true);
            foreach ($listBus as $i) {
                $bus = new Bus();
                $bus->setLibelle($i['libelle']);
                $bus->setHeure($i['hour']);
                $bus->setSejour($sejour);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($bus);
            }
        }else{
            $sejour->setBus(false);
        }


        /*PARTIE RESTRICTIONS*/
        $restrictions = $request->get('restrictions');
        if (!is_null($restrictions) && count($restrictions) > 0) {
            foreach ($restrictions as $res) {
                //$critere = $this->getDoctrine()->getRepository(Critere::class)->findAll();
                $critere= $this->getDoctrine()->getRepository(Critere::class)->find($res['critere']);
                $restriction = new Restriction();
                if ('1' === $res['critere']) {
                    $restriction->setCritereval('Age');
                } elseif ('2' === $res['critere']) {
                    $restriction->setCritereval('Classe');
                } elseif ('3' === $res['critere']) {
                    $restriction->setCritereval('Type de document');
                } else {
                    $restriction->setCritereval('Commune');
                }
                $restriction->setCritere($critere);
                $restriction->setValeur($res['valeur']);
                $restriction->setOperateur($res['operateur']);
                $restriction->setSejour($sejour);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($restriction);
            }
        }

        /*PARTIE VILLES PARTENAIRES*/
        $villesPartenaires = $request->get('villes');
        if (!is_null($villesPartenaires) && count($villesPartenaires) > 0) {
            foreach ($villesPartenaires as $ville) {
                $villePartenaire = new VillePartenaire();
                $villePartenaire->setSejour($sejour);
                $villePartenaire->setVille($ville['libelle']);
                $villePartenaire->setCodePostal($ville['codePostal']);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($villePartenaire);
            }
        }
        /*PARTIE CRITERE ET SECTEUR*/
        $journeesSecteur = $request->get('journeesTop');
        if (!is_null($journeesSecteur) && count($journeesSecteur) > 0) {
            foreach ($journeesSecteur as $journee) {
                if ('true' === $journee['checked'] ) {
                    $journeeSecteur = new JourneeSecteur();
                    $journeeSecteur->setSejour($sejour);
                    $journeeSecteur->setDate($journee['jour']);
                    $journeeSecteur->setCreneau($journee['creneaux']);
                    $journeeSecteur->setPlaces($journee['places']);
                    $journeeSecteur->setSecteur($journee['secteur']);
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($journeeSecteur);
                }
            }
        }



        $sejour->setLibelle($libelle);
        $sejour->setDateDebut(new \DateTime($dateOuverture));
        $sejour->setDateFin(new \DateTime($dateFermeture));
        $sejour->setDateDebutInscriptionsInterne(new \DateTime($dateDebutInscriptionsInterne));
        $sejour->setDateDebutInscriptionsExterne(new \DateTime($dateDebutInscriptionsExterne));
        $sejour->setDateFinInscriptions(new \DateTime($dateFinInscriptions));
        $sejour->setUseCreditNote($useCreditNote);
        $sejour->setVisible($visible);


        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($sejour);
        $entityManager->flush();
        return $this->redirectToRoute('sejour');


    }

    /**
     * @Route("/sejour/delete", options={"expose"=true}, condition="request.isXmlHttpRequest()", name ="sejour_delete")
     * @param Request $request
     * @Method("DELETE")
     * @return Response
     */
    public function deleteSejourAction(Request $request){
        $sejourId = $request->get('id');
        $sejour = $this->getDoctrine()->getRepository
        (Sejour::class)->find($sejourId);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($sejour);
        $entityManager->flush();
        return $this->redirectToRoute('sejour');

    }
}