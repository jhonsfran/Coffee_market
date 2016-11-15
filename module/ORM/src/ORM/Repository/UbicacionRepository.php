<?php
namespace ORM\Repository;

/**
 * Description of UbicacionRepository
 *
 * @author Art
 */
use Doctrine\ORM\EntityRepository;
use ORM\Help\HelpQuery;

class UbicacionRepository extends EntityRepository {

    public function getList($filter) {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();

        $qb->select("u.id,u.nombre")
                ->add('from', 'ORM\Entity\Ubicacion  u')                
                ->groupBy('u.id');
        $hQuery = new HelpQuery();
        $hQuery->setQb($qb);

        $hQuery->setFilterSimple($filter, 'u');
        $hQuery->setSort($filter, 'u', 'id');
        $hQuery->pagination($filter);

        $qb = $hQuery->getQb();
        
        return $qb->getQuery()->getArrayResult();
    }
    
    public function getSelect() {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();

        $qb->select("u.id as id,u.nombre as value")
                ->add('from', 'ORM\Entity\Ubicacion  u')                
                ->groupBy('u.id');        
        
        return $qb->getQuery()->getArrayResult();
    }
    
    public function getById($id){
         
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();

        $qb->select("u.id,u.nombre")
                ->add('from', 'ORM\Entity\Ubicacion  u') 
                ->where('u.id = :id')
                ->groupBy('u.id')
                ->setParameter('id', $id);
        
        return $qb->getQuery()->getArrayResult();
    }
    

}


