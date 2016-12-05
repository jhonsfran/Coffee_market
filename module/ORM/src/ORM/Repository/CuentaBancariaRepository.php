<?php

namespace ORM\Repository;

/**
 * Description of CuentaBancariaRepository
 *
 * @author Art
 */
use Doctrine\ORM\Entity;
use ORM\Help\HelpQuery;
use ORM\Entity\CuentaBancaria;
use Doctrine\ORM\EntityRepository;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;


use ORM\Exception\ErrorException;


class CuentaBancariaRepository extends EntityRepository {

    public function getList($filter) {

    }
    
    public function getById($id){

        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();

        $qb->select("banco")
                ->add('from', 'ORM\Entity\CuentaBancaria  banco') 
                ->where('banco.cuentabanNroCuenta = :id')
                ->groupBy('banco.cuentabanNroCuenta')
                ->setParameters(['id' => $id]);

        
        return $qb->getQuery()->getArrayResult();
    }

    public function guardar($datos) {
        

            $em = $this->getEntityManager();
            
            if (empty($this->getById($datos['num_cuenta']))) {
            //if (true) {
                $objetoCuentaBancaria = new CuentaBancaria();

                $objetoCuentaBancaria->setCuentabanNroCuenta($datos['num_cuenta'])
                    ->setCuentabanEntidadBancaria($datos['tipo_pago'])
                    ->setCuentabanTipoTarjeta($datos['banco'])
                    ->setCuentabanCodigoPostal($datos['codigo_postal'])
                    ->setCuentabanPais($datos['pais']);

                $em->persist($objetoCuentaBancaria);              
                $em->flush();
                
                return true;


            } else {
               
                new ErrorException(ErrorException::REGISTRO_DUPLICADO);
            }
      
    }
    

}
