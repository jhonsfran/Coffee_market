<?php

namespace ORM\Repository;

/**
 * Description of SuscripcionRepository
 *
 * @author Art
 */
use Doctrine\ORM\Entity;
use ORM\Help\HelpQuery;

use ORM\Entity\Producto;
use ORM\Entity\TipoSuscripcion;
use ORM\Entity\Suscripcion;

use Doctrine\ORM\EntityRepository;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class SuscripcionRepository extends EntityRepository {

    public function getList($filter) {

    }
    
    public function getByuser($username){


    }

    public function guardar($precio,$periodicidad,$tpsuscrip_id,$id_producto,$id_tpsuscrip) {
        

        $em = $this->getEntityManager();

        $Producto = $em->getReference('ORM\Entity\Producto', $id_producto);
        $tpsuscrip_id = $em->getReference('ORM\Entity\TipoSuscripcion', $id_tpsuscrip);

        $objDateTime = new \DateTime('NOW');

        if(count($Producto) != 0 || count($tpsuscrip_id) != 0 ){

            $objetoSuscripcion = new Suscripcion();

            $objetoSuscripcion->setSuscripcionFecha($objDateTime)
                ->setSuscripcionPrecio($precio)
                ->setSuscripcionEstado(TRUE)
                ->setSuscripcionPeriodicidad($periodicidad)//mientras tanto para luego enviar el producto
                ->setSuscripcionTipo($tpsuscrip_id)
                ->setSuscripcionProductoProducto($Producto);

                $em->persist($objetoSuscripcion);              
                $em->flush();
                    
                    return true;


            } else {
                   
                new ErrorException(ErrorException::CONSULTA_SIN_RESULTADOS);
            }
      
    }

    public function guardarReturn($precio,$periodicidad,$tpsuscrip_id,$id_producto,$id_tpsuscrip,$cantidad) {
    

        $em = $this->getEntityManager();

        $Producto = $em->getReference('ORM\Entity\Producto', $id_producto);
        $tpsuscrip_id = $em->getReference('ORM\Entity\TipoSuscripcion', $id_tpsuscrip);

        $objDateTime = new \DateTime('NOW');

        if(count($Producto) != 0 || count($tpsuscrip_id) != 0 ){

            $objetoSuscripcion = new Suscripcion();

            $objetoSuscripcion->setSuscripcionFecha($objDateTime)
                ->setSuscripcionPrecio($precio)
                ->setSuscripcionEstado(TRUE)
                ->setSuscripcionCantidad($cantidad)
                ->setSuscripcionPeriodicidad($periodicidad)//mientras tanto para luego enviar el producto
                ->setSuscripcionTipo($tpsuscrip_id)
                ->setSuscripcionProductoProducto($Producto);

                $em->persist($objetoSuscripcion);              
                $em->flush();
                
                return $objetoSuscripcion;


        } else {
               
            new ErrorException(ErrorException::CONSULTA_SIN_RESULTADOS);
        }
      
    }
    

}
