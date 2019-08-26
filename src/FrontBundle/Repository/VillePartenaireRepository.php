<?php

namespace FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;
use FrontBundle\Entity\VillePartenaire;

/**
 * VillePartenaireRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VillePartenaireRepository extends EntityRepository
{
    public function getVillesBySejour($id){
        $qb = $this->_em->createQueryBuilder()
            ->select ('v')
            ->from (VillePartenaire::class, 'v')
            ->where('v.sejour IN (:id)')
            ->setParameter('id', $id);


        return $qb ->getQuery()->getResult();
    }
}
