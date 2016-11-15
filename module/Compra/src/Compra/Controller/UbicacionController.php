<?php

namespace Producto\Controller;
/**
 * Description of UbicacionController
 *
 * @author andres
 */
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\Common\Persistence\ObjectManager;
use Zend\View\Model\JsonModel;
use ORM\Entity\Ubicacion;
use Application\Utils\Utilidades;

class UbicacionController extends AbstractActionController {

    private $em;

    function __construct(ObjectManager $objectManager) {
        $this->em = $objectManager;
    }

    public function adminAction() {
        $request = $this->getRequest();
        $dataPost = $request->getPost();
        $action = $dataPost['action'];
        switch ($action) {
            case 'getList':
                return new JsonModel($this->getList($dataPost['filter']));
                break;
            case 'getSelect':
                return new JsonModel($this->getSelect());
                break;
            case 'guardar':
                return new JsonModel($this->guardar($dataPost['data']));
                break;
            case 'getById':
                return new JsonModel($this->getById($dataPost['id']));
                break;
            default:
                return new ViewModel();
                break;
        }
    }

    public function getList($filter) {        
        $result = $this->em->getRepository('ORM\Entity\Ubicacion')->getList($filter);
        $count = count($this->em->getRepository('ORM\Entity\Ubicacion')->findAll());
        return array(
            'error' => FALSE,
            'data' => $result,
            'itemsCount' => $count
        );
    }
    public function getSelect() {        
        $result = $this->em->getRepository('ORM\Entity\Ubicacion')->getSelect();      
        return array(
            'error' => FALSE,
            'data' => $result
        );
    }

    public function guardar($dataPost) {
        try {
            $entity = new Ubicacion();
            if (isset($dataPost['id']))
                $entity = $this->em->getRepository('ORM\Entity\Ubicacion')->find($dataPost['id']);
            if (empty($entity)) {
                new ErrorException(ErrorException::CONSULTA_SIN_RESULTADOS);
            }
            Utilidades::saveEntity('ORM\Entity\Ubicacion', $entity, $dataPost);

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

    public function getById($id) {
        try {
            $resultOne = $this->em->getRepository('ORM\Entity\Ubicacion')->getById($id);
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
    
    public function formlyAction() {
        $formulario = Utilidades::getFormly('ORM\Entity\Ubicacion');
        return new JsonModel(array(
            'error' => FALSE,
            'data' => $formulario
        ));
    }

}
