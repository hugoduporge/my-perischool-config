<?php
namespace BusinessBundle\Managers;

use FrontBundle\Entity\Sejour;
use Symfony\Bundle\FrameworkBundle\Tests\Fixtures\BaseBundle\BaseBundle;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;


class SejourManager extends Controller{
    /**
     * @param $libelle
     * @param $sejour
     */
    public function creerSejour($libelle){
        $sejour = new Sejour();
        $sejour->setLibelle($libelle);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($sejour);
        $entityManager->flush();

    }
}
