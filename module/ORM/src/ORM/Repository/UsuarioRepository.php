<?php

namespace ORM\Repository;

/**
 * Description of UsuarioRepository
 *
 * @author Art
 */
use Doctrine\ORM\Entity;
use ORM\Help\HelpQuery;
use ORM\Entity\CuentaBancaria;
use ORM\Entity\Usuario;
use Doctrine\ORM\EntityRepository;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class UsuarioRepository extends EntityRepository {

    public function getList($filter) {

    }
    
    public function getById($username){

        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();

        $qb->select("user.usuarioNickname,user.usuarioNombres,user.usuarioApellidos,user.usuarioNumDoc,user.usuarioEmail")
                ->add('from', 'ORM\Entity\Usuario  user') 
                ->where('user.usuarioNickname = :username')
                ->groupBy('user.usuarioNickname')
                ->setParameters(['username' => $username]);

        
        return $qb->getQuery()->getArrayResult();
    }

    public function guardar($datos,$id_cuenta_banco,$url_foto) {
        

            $em = $this->getEntityManager();

            //$cuenta_banco = $em->getRepository('ORM\Entity\CuentaBancaria')->find($id_cuenta_banco);

            //$cuenta_banco = $em->find('ORM\Entity\CuentaBancaria', $id_cuenta_banco);
            $cuenta_banco = $em->getReference('ORM\Entity\CuentaBancaria', $id_cuenta_banco);

            echo $id_cuenta_banco;

            $objDateTime = new \DateTime('NOW');

            if(count($cuenta_banco) != 0){

                if (empty($this->getById($datos['username']))) {

                    $objetoUsuario = new Usuario();

                    //$cuenta_banco[0]->__get('cuentabanNroCuenta');

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
