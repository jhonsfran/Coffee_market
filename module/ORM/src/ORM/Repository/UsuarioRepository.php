<?php

namespace ORM\Repository;

/**
 * Description of UsuarioRepository
 *
 * @author Art
 */
use Doctrine\ORM\Entity;
use ORM\Help\HelpQuery;
use Doctrine\ORM\EntityRepository;

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
    

}
