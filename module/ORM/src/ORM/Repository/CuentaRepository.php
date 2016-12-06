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

    public function guardar($datos,$id_cuenta_banco,$url_foto) {
        

            $em = $this->getEntityManager();

            $cuenta_banco = $em->getReference('ORM\Entity\CuentaBancaria', $id_cuenta_banco);

            echo $id_cuenta_banco;

            $objDateTime = new \DateTime('NOW');

            if(count($cuenta_banco) != 0){

                if (empty($this->getById($datos['username']))) {

                    $objetoUsuario = new Usuario();

                    $objetoUsuario->setUsuarioNickname($datos['username'])
                        ->setUsuarioApellidos($datos['apellidos'])
                        ->setUsuarioNombres($datos['nombres'])
                        ->setUsuarioTipoDoc($datos['tipo_documento'])
                        ->setUsuarioNumDoc($datos['documento'])
                        ->setUsuarioTelefono($datos['telefono'])
                        ->setUsuarioEmail($datos['email'])
                        ->setUsuarioFechaRegistro($objDateTime)
                        ->setUsuarioFotoPerfil($url_foto)
                        ->setUsuarioCuentabanNroCuenta($cuenta_banco);

                        $em->persist($objetoUsuario);              
                        $em->flush();
                        
                        return true;


                } else {
                   
                    new ErrorException(ErrorException::REGISTRO_DUPLICADO);
                }

            } else {
                   
                new ErrorException(ErrorException::CONSULTA_SIN_RESULTADOS);
            }
      
    }
    

}
