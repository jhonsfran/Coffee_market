<?php

namespace ORM\Repository;

/**
 * Description of CuentaRepository
 *
 * @author Art
 */
use Doctrine\ORM\Entity;
use ORM\Help\HelpQuery;
use Doctrine\ORM\EntityRepository;

class CuentaRepository extends EntityRepository {

    public function getList($filter) {

    }
    
    public function getByuser($username){

        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();

        $qb->select('cuenta, c, r')
        ->from('ORM\Entity\Cuenta', 'cuenta')
        ->join('cuenta.cuentaUsername', 'c')
        ->join('cuenta.cuentaRol', 'r')
        //->join('cuenta.cuentaSuscripcion', 's')
        ->where($qb->expr()->in('c.usuarioNickname', ':username'))
        ->andwhere('r.rolIdRol = cuenta.cuentaRol')
        //->andwhere('s.suscripcionIdSuscripcion = cuenta.cuentaSuscripcion')
        ->setParameter('username', $username);

        return $qb->getQuery()->getArrayResult();


    }
    

}
