<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Compra\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Doctrine\Common\Persistence\ObjectManager;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;
use Application\Utils\Utilidades;
use ORM\Entity\Proveedor;

class ProveedorController extends AbstractActionController {

    private $em;

    function __construct(ObjectManager $objectManager) {
        $this->em = $objectManager;
    }

    public function adminAction() {
        try {
            $request = $this->getRequest();
            $dataPost = $request->getPost();
            $action = $dataPost['action'];
            switch ($action) {
                case 'getList':
                    return new JsonModel($this->getList($dataPost['filter']));
                    break;
                case 'getSelect':
                    return new JsonModel($this->getSelect($dataPost['filter']));
                    break;                
                case 'guardar':
                    return new JsonModel($this->guardar($dataPost['data']));
                    break;
                case 'getById':
                    return new JsonModel($this->getById($dataPost['id']));
                    break;
                default :                
                    return  new ViewModel();
                    break;
            }
        } catch (\Exception $e) {
            echo "-->mensaje: " . $e->getMessage() . "\n";
            echo "-->code: " . $e->getCode() . "\n";
        }
    }

    public function getList($filter) {
        $result = $this->em->getRepository('ORM\Entity\Proveedor')->getList($filter);
        $count = count($this->em->getRepository('ORM\Entity\Proveedor')->findAll());
        return array(
            'error' => FALSE,
            'data' => $result,
            'itemsCount' => $count
        );
    }
    
    public function getSelect($filter) {        
        $result = $this->em->getRepository('ORM\Entity\Proveedor')->getSelect($filter);      
        return array(
            'error' => FALSE,
            'data' => $result
        );
    }

    public function getById($id) {
        try {
            $resultOne = $this->em->getRepository('ORM\Entity\Proveedor')->getById($id);
            if (empty($resultOne)) {
                new ErrorException(ErrorException::CONSULTA_SIN_RESULTADOS);
            } else {
                return array(
                    'error' => FALSE,
                    'data' => $resultOne
                );
            }
        } catch (CustomException $e) {
            return array(
                'error' => TRUE,
                'mensaje' => $e->getMessage(),
                'code' => $e->getCode()
            );
        }
    }

    public function guardar($dataPost) {
        try {
            $entity = new Proveedor();
            if (isset($dataPost['id']))
                $entity = $this->em->getRepository('ORM\Entity\Proveedor')->find($dataPost['id']);
            if (empty($entity)) {
                new ErrorException(ErrorException::CONSULTA_SIN_RESULTADOS);
            }
            Utilidades::saveEntity('ORM\Entity\Proveedor', $entity, $dataPost);                     
            
            $this->em->persist($entity);
            $this->em->flush();

            return array(
                'error' => FALSE,
                'data' => SAVE_OK
            );
        } catch (CustomException $e) {
            return array(
                'error' => true,
                'mensaje' => $e->getMessage(),
                'code' => $e->getCode()
            );
        } catch (\PDOException $e) {
            return array(
                'error' => true,
                'mensaje' => "asdfghj",
                'code' => $e->getCode()
            );
        }
    }

    public function formlyAction() {
        $formulario = Utilidades::getFormly('ORM\Entity\Proveedor');
        return new JsonModel(array(
            'error' => FALSE,
            'data' => $formulario
        ));
    }

}
