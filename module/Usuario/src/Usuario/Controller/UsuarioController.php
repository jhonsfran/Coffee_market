<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Usuario\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Doctrine\Common\Persistence\ObjectManager;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;
use Application\Utils\Utilidades;
use ORM\Entity\Usuario;
//use ORM\Entity\Sesion;
//use ORM\Entity\Roles;

class UsuarioController extends AbstractActionController {

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
                case 'guardar':
                    return new JsonModel($this->guardar($dataPost['data']));
                    break;
                case 'getById':
                    return new JsonModel($this->getById($dataPost['id']));
                    break;
                case 'estado':
                    return new JsonModel($this->estado($dataPost['data']));
                    break;
                case 'password':
                    return new JsonModel($this->password($dataPost['data']));
                default :
                    return new ViewModel();
                    break;
            }
        } catch (\Exception $e) {
            echo "-->mensaje: " . $e->getMessage() . "\n";
            echo "-->code: " . $e->getCode() . "\n";
        }
    }

    public function getList($filter) {
        $objUsuario = $this->em->getRepository('ORM\Entity\Usuario')->getList($filter);
        $countUsuario = count($this->em->getRepository('ORM\Entity\Usuario')->findAll());
        return array(
            'error' => FALSE,
            'data' => $objUsuario,
            'itemsCount' => $countUsuario
        );
    }

    public function getById($id) {
        try {
            $objUsuario = $this->em->getRepository('ORM\Entity\Usuario')->getById($id);
            if (empty($objUsuario)) {
                new ErrorException(ErrorException::CONSULTA_SIN_RESULTADOS);
            } else {
                return array(
                    'error' => FALSE,
                    'data' => $objUsuario
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
            $objusuario = new Usuario();
            if (isset($dataPost['id']))
                $objusuario = $this->em->getRepository('ORM\Entity\Usuario')->find($dataPost['id']);
            if (empty($objusuario)) {
                new ErrorException(ErrorException::CONSULTA_SIN_RESULTADOS);
            }
            Utilidades::saveEntity('ORM\Entity\Usuario', $objusuario, $dataPost);

            if (!isset($dataPost['id'])) {
                $objsesion = new Sesion ();
                $objsesion->setUsuarioidentificacion($objusuario);
                $objsesion->setEstado("1");
                $objsesion->setContrasena(strtoupper($dataPost['nombre'][0]) . $dataPost['identificacion'] . strtoupper($dataPost['apellidos'][0]));
                $this->em->persist($objsesion);
            } elseif (isset($dataPost['id'])) {
                $objsesion = $this->em->getRepository('ORM\Entity\Sesion')->find($dataPost['sesion_id']);
                foreach ($objsesion->getRolesid() as $objrol) {
                    $objsesion->removeRolesid($objrol);
                    $objrol->removeSesionid($objsesion);
                }
            }
            foreach ($dataPost['roles'] as $key => $rol_id) {
                $objrol = $this->em->getRepository('ORM\Entity\Roles')->find($rol_id);
                $objsesion->getRolesid()->add($objrol);
                $objrol->getSesionid()->add($objsesion);
            }
            $this->em->persist($objusuario);
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
        $formulario = Utilidades::getFormly('ORM\Entity\Usuario');
        return new JsonModel(array(
            'error' => FALSE,
            'options' => $this->getRoles(),
            'data' => $formulario
        ));
    }

    public function formlypassAction() {
        $formulario = Utilidades::getFormly('ORM\Entity\Sesion');
        return new JsonModel(array(
            'error' => FALSE,
            'data' => $formulario
        ));
    }

    public function getRoles() {
        $objRoles = $this->em->getRepository('ORM\Entity\Roles')->getList();
        return $objRoles;
    }

    public function estado($dataPost) {
        try {
            $objsesion = $this->em->getRepository('ORM\Entity\Sesion')->find($dataPost['id']);
            if (empty($objsesion)) {
                new ErrorException(ErrorException::CONSULTA_SIN_RESULTADOS);
            }
            $estado = $dataPost['estado'] == 'true' ? 0 : 1; // ?? http://php.net/manual/es/language.types.boolean.php
            $objsesion->setEstado($estado);
            $this->em->persist($objsesion);
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
        }
    }

    public function password($dataPost) {
        try {
            $objsesion = $this->em->getRepository('ORM\Entity\Sesion')->find($dataPost['id']);
            if (empty($objsesion)) {
                new ErrorException(ErrorException::CONSULTA_SIN_RESULTADOS);
            }
            $objsesion->setContrasena($dataPost['contrasena']);
            $this->em->persist($objsesion);
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
        }
    }

}
