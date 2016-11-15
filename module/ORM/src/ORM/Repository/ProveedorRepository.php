<?php
namespace ORM\Repository;
/**
 * Description of ProveedorRepository
 *
 * @author Art
 */
use Doctrine\ORM\EntityRepository;
use ORM\Help\HelpQuery;

class ProveedorRepository extends EntityRepository {

    public function getList($filter) {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();

        $qb->select("p.id,p.nit,p.nombre")
                ->add('from', 'ORM\Entity\Proveedor  p')
                ->groupBy('p.id');
        $hQuery = new HelpQuery();
        $hQuery->setQb($qb);

        $hQuery->setFilterSimple($filter, 'p');
        $hQuery->setSort($filter, 'p', 'id');
        $hQuery->pagination($filter);

        $qb = $hQuery->getQb();
        
        return $qb->getQuery()->getArrayResult();
    }
    
    public function getById($id){
         
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();

        $qb->select("p.id,p.nit,p.nombre")
                ->add('from', 'ORM\Entity\Proveedor  p') 
                ->where('p.id = :id')
                ->groupBy('p.id')
                ->setParameter('id', $id);
        
        return $qb->getQuery()->getArrayResult();
    }
    
     public function getSelect($filter) {         
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();

        $qb->select("p.id as id,p.nombre as value")
                ->add('from', 'ORM\Entity\Proveedor  p')               
                ->groupBy('p.id')
                ->setMaxResults(10);
                
        $hQuery = new HelpQuery();
        $hQuery->setQb($qb);
        $hQuery->setFilterSimple($filter, 'p');        
        $qb = $hQuery->getQb();
        
//        print_r($qb->getQuery()->getSQL());
        return $qb->getQuery()->getArrayResult();
    }
    

}
