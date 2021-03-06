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
use ORM\Entity\Rol;
use ORM\Entity\TipoCuenta;
use ORM\Entity\Suscripcion;
use Doctrine\ORM\EntityRepository;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

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

    public function guardar($id_user,$id_rol,$suscrip,$id_tpcuenta,$pass) {
        

            $em = $this->getEntityManager();

            $username = $em->getReference('ORM\Entity\Usuario', $id_user);
            $rol_id = $em->getReference('ORM\Entity\Rol', $id_rol);
            $tipoCuenta = $em->getReference('ORM\Entity\TipoCuenta', $id_tpcuenta);

            $objDateTime = new \DateTime('NOW');

            if(count($username) != 0 || count($rol_id) != 0 || count($tipoCuenta) != 0){

                $objetoCuenta = new Cuenta();

                $objetoCuenta->setCuentaUsername($username)
                    ->setCuentaFechaCreacion($objDateTime)
                    ->setCuentaAcumuladorPuntos(0)
                    ->setCuentaEstado(TRUE)
                    ->setCuentaPassword($pass)
                    ->setCuentaNivel(0)
                    ->setCuentaReputacion(0)
                    ->setCuentaExpe(0)
                    ->setCuentaRol($rol_id)
                    ->setCuentaSuscripcion($suscrip)
                    ->setCuentaTipo($tipoCuenta);

                    $em->persist($objetoCuenta);              
                    $em->flush();
                    
                    return true;


            } else {
                   
                new ErrorException(ErrorException::CONSULTA_SIN_RESULTADOS);
            }
      
    }
    

}
