<?php
namespace ORM\Repository;

/**
 * Description of ProductoRepository
 *
 * @author Art
 */
use Doctrine\ORM\Entity;
use ORM\Help\HelpQuery;

class ProductoRepository extends EntityRepository {

    public function getList($filter) {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();

        $qb->select("p.id,p.referencia,p.descripcion,p.observacion,u.nombre")
                ->add('from', 'ORM\Entity\Producto  p')
                ->leftJoin('p.ubicacion', 'u')
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

        $qb->select("p.id,p.referencia,p.descripcion,p.observacion,u.id as ubicacion")
                ->add('from', 'ORM\Entity\Producto  p') 
                ->leftJoin('p.ubicacion', 'u')
                ->where('p.id = :id')
                ->groupBy('p.id')
                ->setParameter('id', $id);
        
        return $qb->getQuery()->getArrayResult();
    }
    

}
