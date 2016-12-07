<?php

namespace ORM\Repository;

/**
 * Description of CuentaRepository
 *
 * @author Art
 */
use Doctrine\ORM\Entity;
use ORM\Help\HelpQuery;
use ORM\Entity\Usuario;

use ORM\Entity\Cuenta;
use ORM\Entity\PreferenciaCuenta;
use ORM\Entity\Preferencias;

use Doctrine\ORM\EntityRepository;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class PreferenciaCuentaRepository extends EntityRepository {

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

    public function guardar($id_prefer,$id_cuenta) {
        

            $em = $this->getEntityManager();

            $preferencia = $em->getReference('ORM\Entity\Preferencias', $id_prefer);
            $cuenta = $em->getReference('ORM\Entity\Cuenta', $id_cuenta);

            if(count($preferencia) != 0 || count($cuenta) != 0){

                $objetoCuenta = new PreferenciaCuenta();

                $objetoPrefeCuenta->setPrefcuentaPreferencia($preferencia)
                    ->setPrefcuentaCuenta($cuenta);

                    $em->persist($objetoPrefeCuenta);              
                    $em->flush();
                    
                    return true;


            } else {
                   
                new ErrorException(ErrorException::CONSULTA_SIN_RESULTADOS);
            }
      
    }
    

}
