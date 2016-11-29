<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Cuenta\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Doctrine\Common\Persistence\ObjectManager;
use Cuenta\Exception\ErrorException;
use Cuenta\Exception\CustomException;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use ORM\Entity\Cuenta;
use Doctrine\ORM\EntityManager;
use Zend\Session\Config\SessionConfig;
use Zend\Session\Container;
use Zend\Session\SessionManager;

class LoginController extends AbstractActionController {

    protected $em;

      public function __construct(EntityManager $entityManager)
      {
        $this->em = $entityManager;
      }


    public function indexAction() {

        try {

            $request = $this->getRequest();
            $dataPost = $request->getPost();
            $action = $dataPost['action'];

            switch ($action) {

                case 'ingresar':

                    $objUsuario = $this->em->getRepository('ORM\Entity\Cuenta')->getByuser($dataPost['username']);

                    $mensajes[] = "Usted ha digitado un usuario incorrecto o el usuario no existe en la Base de Datos";
                    $mensajes[] = "La contraseña es invalida";
                    $mensajes[] = "Su usuario ha sido desactivado";
                    $mensajes[] = "Su usuario ha sido ha expirado";
                    $mensajes[] = "Ok";

                    $salida="";

                    if(count($objUsuario) != 0){

                        $user = $objUsuario[0]['cuentaUsername']['usuarioNickname'];
                        $passw = $objUsuario[0]['cuentaPassword'];
                        $rol = $objUsuario[0]['cuentaRol']['rolIdRol'];

        
                        if($dataPost['password_user'] != $passw){

                            $salida = $mensajes[1];

                            return new JsonModel(array(
                                'error' => FALSE,
                                'mensaje' => $salida                            
                            ));

                        }else if ($dataPost['password_user'] == $passw){

                            $salida = $mensajes[4];

                            /*Creamos la sesion con los datos necesarios*/
                            $sessionConfig = new SessionConfig();

                            if($dataPost['recuerdame']){

                                $sessionConfig->setOptions(array(
                                    'remember_me_seconds' => 3600,
                                    'use_cookies' => true,
                                    'cookie_httponly' => true
                                    )
                                );

                            }else{

                                $sessionConfig->setOptions(array(
                                    'remember_me_seconds' => 0,
                                    'use_cookies' => true,
                                    'cookie_httponly' => true
                                    )
                                );

                            }

                            $sessionManager = new SessionManager($sessionConfig);
                            $sessionManager->start();
                            Container::setDefaultManager($sessionManager);

                            $user_session = new Container('user');
                            $user_session->username = $user;
                            $user_session->pass = $passw;
                            $user_session->rol = $rol;

                            //return $this->redirect()->toRoute('Social-coffee');


                            return new JsonModel(array(
                                'error' => FALSE,
                                'mensaje' => $salida                            
                            ));
                        }
                    }else{

                        $salida = $mensajes[0];

                        return new JsonModel(array(
                            'error' => TRUE,
                            'mensaje' => $salida                            
                        ));

                    }

                    break;

                default :
                    return new ViewModel();
                    break;
            }


        } catch (\ORM\Exception\CustomBDException $ex) {
            echo "-->mensaje: " . $ex->getMessage() . "\n";
            echo "-->code: " . $ex->getCode() . "\n";
        }
    }



    public function errorAction() {
        return new ViewModel();
    }


    public function generatedPass() {
        //Se define una cadena de caractares. Te recomiendo que uses esta.
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        //Obtenemos la longitud de la cadena de caracteres
        $longitudCadena=strlen($cadena);
         
        //Se define la variable que va a contener la contraseña
        $pass = "";
        //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
        $longitudPass=10;
         
        //Creamos la contraseña
        for($i=1 ; $i<=$longitudPass ; $i++){
            //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
            $pos=rand(0,$longitudCadena-1);
         
            //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
            $pass .= substr($cadena,$pos,1);
        }
        return $pass;
    }



    public function enviarconfirmacion($email,$name) {

        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            //echo "No arguments Provided!";
            //return false;

        $clave = generatedPass();

            
        // Create the email and send the message
        $to = 'yourname@yourdomain.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
        $email_subject = "Reestablecer contraseña";
        $email_body = "Hola, tu nueva contraseña es $clave";
        $headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
        $headers .= "Reply-To: $email_address"; 

        mail($to,$email_subject,$email_body,$headers);
        //return true;  

        }
    }

}
