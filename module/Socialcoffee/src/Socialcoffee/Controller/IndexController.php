<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Socialcoffee\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Doctrine\Common\Persistence\ObjectManager;
use Socialcoffee\Exception\ErrorException;
use Socialcoffee\Exception\CustomException;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use ORM\Entity\Cuenta;
use Zend\Session\Config\SessionConfig;
use Zend\Session\Container;
use Zend\Session\SessionManager;
use Doctrine\ORM\EntityManager;




class IndexController extends AbstractActionController {

	protected $em;

	public function __construct(EntityManager $entityManager)
	{
		$this->em = $entityManager;
	}

    public function indexAction() {


    	//$id=$this->params()->fromRoute('id');
    	//$this->view->idUsuario = 'sssssssss';

    	/*return new ViewModel(array('nombre'=>$id)
                );*/

		try {

			$request = $this->getRequest();
			$dataPost = $request->getPost();
			$action = $dataPost['action'];
			        
	    	if (!isset($_REQUEST['action'])){//se valida si existe una action sobre el formulario, esto con el fin de saber si esta mos en la página de inicio y se ha entrado desde url y no desde login
    			$session = new Container('user');

    			if ($session && $session->username) {

    				$objUsuario = $this->em->getRepository('ORM\Entity\Cuenta')->getByuser($session->username);//con los datos de la cookie buscamos el usuario logeado

    				/*return new JsonModel(array(
    				'error' => FALSE,
    				'user' => $session->username,
    				'pass' => $session->pass,
    				'rol' => $objUsuario[0]['cuentaUsername']
    				));*/


    				$salida="";

    				if(count($objUsuario) != 0){//si viene de login es porque existe usuario, por lo tanto no es necesario hacer el else pero se pone para no dejar bugs

    					/*Traemos los datos de la BD para compararlos con los datos de la cookie*/
    				    $user = $objUsuario[0]['cuentaUsername']['usuarioNickname'];
    				    $passw = $objUsuario[0]['cuentaPassword'];
    				    $rol = $objUsuario[0]['cuentaRol']['rolIdRol'];

    				
    				    if($session->pass != $passw){// rdireccionamos todo lo sospechoso a login

    				        //si no está logeado se redirecciona a una página de error
    				        $uri = $this->getRequest()->getUri();
    				        $url = strstr($uri, "socialcoffee", true);

    				        return $this->redirect()->toUrl($url.'cuenta/login/error');

    				    }else if ($session->pass == $passw){// si la cookie se valida y la contraseña tambien, entonces procedemos a gestionar las peticiones

    						switch ($action) {

							    case 'validar':

				    				return new JsonModel(array(
					    				'error' => FALSE,
					    				'user' => $session->username,
					    				'pass' => $session->pass,
					    				'rol' => $objUsuario[0]['cuentaUsername']
				    				));


							        break;

							    default ://si es la primera vez que ingresa y no hay acción se debe mostrar la timeline

							    		//$this->view->idUsuario = 'sssssssss';

							    		//me queda mandarle los parametros a la vista para que los ponga en su sitio, luego de eso paso al registro

							    		$datos_usuario = $objUsuario[0]['cuentaUsername'];

							    		return new ViewModel(
							    			array(

							    				'nombres_user'=>$objUsuario[0]['cuentaUsername']['usuarioNombres'],
							    				'apellidos_user'=>$objUsuario[0]['cuentaUsername']['usuarioApellidos'],
							    				'nickname_user'=>$objUsuario[0]['cuentaUsername']['usuarioNickname']

							    				)
					    	            );

							    	//al cargarse el perfil
						            break;
							    }

    					}else {// rdireccionamos todo lo sospechoso a login

    						//si no está logeado se redirecciona a una página de error
    						$uri = $this->getRequest()->getUri();
    						$url = strstr($uri, "socialcoffee", true);

    						return $this->redirect()->toUrl($url.'cuenta/login/error');

    					}

    				}else {// rdireccionamos todo lo sospechoso a login

    						//si no está logeado se redirecciona a una página de error
    						$uri = $this->getRequest()->getUri();
    						$url = strstr($uri, "socialcoffee", true);

    						return $this->redirect()->toUrl($url.'cuenta/login/error');

    					}

    			}else{// rdireccionamos todo lo sospechoso a login

    				//si no está logeado se redirecciona a una página de error
    				$uri = $this->getRequest()->getUri();
    				$url = strstr($uri, "socialcoffee", true);

    				return $this->redirect()->toUrl($url.'cuenta/login/error');
    			}
	    	}

    	}catch (\ORM\Exception\CustomBDException $ex) {
            echo "-->mensaje: " . $ex->getMessage() . "\n";
            echo "-->code: " . $ex->getCode() . "\n";
        }
    }


    public function timeLine() {


    }

    public function salirAction() {

    	$session = new Container('user');
		unset($session->username);
        session_destroy();


		//si no está logeado se redirecciona a una página de error
		$uri = $this->getRequest()->getUri();
		$url = strstr($uri, "socialcoffee", true);

		return $this->redirect()->toUrl($url.'cuenta/login/index');

    }

    /*

$session = new Container('userdata');
	unset($session->username);
Zend_Session::namespaceUnset('mysession');
Zend_Session::destroy();

    */

}
