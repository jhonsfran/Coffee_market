<?php

namespace ORM\Repository;

/**
 * Description of UsuarioRepository
 *
 * @author Art
 */
use Doctrine\ORM\EntityRepository;
use ORM\Help\HelpQuery;

class UsuarioRepository extends EntityRepository {

    public function getList($filter) {
        $emConfig = $this->getEntityManager()->getConfiguration();
        $emConfig->addCustomStringFunction('GROUP_CONCAT', 'DoctrineExtensions\Query\Mysql\GroupConcat');      
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();

        $qb->select("s.id,s.estado,u.id AS id_usuario,u.identificacion,CONCAT(u.nombre,' ',u.apellidos)AS nombre"
                        . ",u.correo,u.contacto,GROUP_CONCAT(r.nombre SEPARATOR ',')AS roles")
                ->add('from', 'ORM\Entity\Sesion  s')
                ->innerJoin('s.usuarioidentificacion', 'u')
                ->innerJoin('s.rolesid', 'r')
                ->groupBy('u.id');
        $hQuery = new HelpQuery();
        $hQuery->setQb($qb);

        $hQuery->setFilterSimple($filter, 'u');
        $hQuery->setSort($filter, 'u', 'identificacion');
        $hQuery->pagination($filter);

        $qb = $hQuery->getQb();
        
        return $qb->getQuery()->getArrayResult();
    }
    
    public function getById($id){
        $emConfig = $this->getEntityManager()->getConfiguration();
        $emConfig->addCustomStringFunction('GROUP_CONCAT', 'DoctrineExtensions\Query\Mysql\GroupConcat');
        $emConfig->addCustomStringFunction('REPLACE', 'DoctrineExtensions\Query\Mysql\Replace');  
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();

        $qb->select("s.id AS sesion_id,u.id,u.identificacion,u.nombre,u.apellidos"
                        . ",REPLACE(u.correo,'@CORREOUNIVALLE.EDU.CO','')AS correo,u.contacto,CONCAT('[',GROUP_CONCAT(r.id SEPARATOR ','),']') AS roles")
                ->add('from', 'ORM\Entity\Sesion  s')
                ->innerJoin('s.usuarioidentificacion', 'u')
                ->innerJoin('s.rolesid', 'r')
                ->where('s.id = :id')
                ->groupBy('u.id')
                ->setParameter('id', $id);
        
        return $qb->getQuery()->getArrayResult();
    }
    

}
