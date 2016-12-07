<?php

namespace ORM\Repository;

/**
 * Description of DireccionesUsuarioRepository
 *
 * @author Art
 */
use Doctrine\ORM\Entity;
use ORM\Help\HelpQuery;
use ORM\Entity\DireccionesUsuario;
use ORM\Entity\Suscripcion;
use ORM\Entity\Usuario;

use Doctrine\ORM\EntityRepository;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class DireccionesUsuarioRepository extends EntityRepository {

    public function getList($filter) {

    }
    
    public function getByid($id){


    }

    public function guardar($id_user,$dir) {
        

            $em = $this->getEntityManager();

            $username = $em->getReference('ORM\Entity\Usuario', $id_user);

            $objDateTime = new \DateTime('NOW');

            if(count($username) != 0 ){

                    $objetoDir = new DireccionesUsuario();

                    $objetoDir->setDirDireccion($dir)
                        ->setDirusuarioNickname($username);

                        $em->persist($objetoDir);              
                        $em->flush();
                        
                        return true;

            } else {
                   
                new ErrorException(ErrorException::CONSULTA_SIN_RESULTADOS);
            }
      
    }
    

}
