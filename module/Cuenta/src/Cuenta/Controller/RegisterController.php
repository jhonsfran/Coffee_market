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
use ORM\Entity\Usuario;
use ORM\Entity\Cuenta;
use ORM\Entity\CuentaBancaria;

use Doctrine\ORM\EntityManager;
use Zend\Session\Config\SessionConfig;
use Zend\Session\Container;
use Zend\Session\SessionManager;

class RegisterController extends AbstractActionController {

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


                case 'validar_nickname':

                    $objUsuario = $this->em->getRepository('ORM\Entity\Cuenta')->getByuser($dataPost['username']);

                    if(count($objUsuario) != 0){

                        $sessionConfig = new SessionConfig();


                            $sessionConfig->setOptions(array(
                                'remember_me_seconds' => 3600,
                                'use_cookies' => true,
                                'cookie_httponly' => true
                                )
                            );

                        $sessionManager = new SessionManager($sessionConfig);
                        $sessionManager->start();
                        Container::setDefaultManager($sessionManager);

                        $user_session = new Container('user');
                        $user_session->username = $dataPost['username'];//lo hacemos para persistir la información del usuario y poder guardar la foto
                        $user_session->url = "public/img/perfil/";//mas adelante será necesaria

                        return new JsonModel(array(
                            'existe' => TRUE                         
                        ));

                    }else{

                        return new JsonModel(array(
                            'existe' => FALSE                         
                        ));

                    }


                    break;


                case 'find_prefer':

                    $objPreferencias = $this->em->getRepository('ORM\Entity\Preferencias')->getList();

                    if(count($objPreferencias) != 0){

                        //$this->enviarconfirmacion($objUsuario->$usuarioEmail,$objUsuario->$usuarioNombres);

                        return new JsonModel(array(
                            'error' => FALSE,
                            'data' => $objPreferencias,
                            'itemsCount' => count($objPreferencias))
                        );

                    }else{

                        return new JsonModel(array('itemsCount' => 0));
                    }

                    break;

                case 'carga_archivo':

                    if ($_FILES['input-image']["error"] > 0){

                        return new JsonModel(array(
                            'error' => true,
                            'mensaje' => 'No se pudo cargar la foto, por favor, intentelo de nuevo'
                            )
                        );

                    }else{


                            $session = new Container('user');

                            if ($session && $session->username) {
                                $nombre_user = $session->username;
                            }else{
                                $nombre_user = $_FILES['input-image']['name'];
                            }
                        

/*
                        echo "Nombre: " . $_FILES['input-image']['name'] . "<br>";
                        echo "Tipo: " . $_FILES['input-image']['type'] . "<br>";
                        echo "tamaño" . ($_FILES["input-image"]["size"] / 1024) . " kB<br>";
                        echo "Carpeta temporal: " . $_FILES['input-image']['tmp_name'];

                        */

                            //Nombre de la carpeta del aspirante donde va guardar el documento ** Preguntar a lucho si por codigo o documento para hacer la consulta SQL
                            //$nombre_doc = $_FILES['input-image']['name'];//necesito el nombre del documento
                            //ver que id de documento es para asignar el nombre
                            //necesito el documento de identidad del aspirante
                            //$url = "***".$asp_codigo."/".$nombre_doc;
                            //echo $url;
                        
                        //Crea Carpeta donde se van a guardar las fotos

                        if(!file_exists("public/img/perfil")){
                          mkdir("public/img/perfil", 0777, true);//crea carpeta
                          chmod("public/img/perfil", 0777);
                        }


                        $tmp = explode('.', $_FILES['input-image']['name']);
                        $extension = end($tmp);

                        $nombre_archivo = $nombre_user.".".$extension;
                        $url_foto = "public/img/perfil/".$nombre_archivo;
                        move_uploaded_file ($_FILES['input-image']['tmp_name'], "public/img/perfil/{$_FILES['input-image']['name']}");
                        chmod("public/img/perfil/{$_FILES['input-image']['name']}", 0777);
                        rename("public/img/perfil/{$_FILES['input-image']['name']}", $url_foto);

                        $session->url_perfil = $url_foto;

                        return new JsonModel(array(
                            'link' => 'Se cargó exitosamente'
                            )
                        );

                    }

                    break;

                case 'guardar':

                    $guardo = $this->guardar($dataPost);

                    /*if($guardo){

                        return new JsonModel(array(
                            'existe' => TRUE                         
                        ));

                    }else{

                        return new JsonModel(array(
                            'data' => $dataPost                         
                        ));

                    }*/
/*
                    return new JsonModel(array(
                            'data' => $dataPost                         
                        ));
                        */


                    break;

                default :
                    return new ViewModel();
                    break;
            }


        } catch (\ORM\Exception\CustomBDException $ex) {

            return new JsonModel(array(
                    'error' => true,
                    'mensaje' => $ex->getMessage(),
                    'code' => $ex->getCode()                         
                ));

            //echo "-->mensaje: " . $ex->getMessage() . "\n";
            //echo "-->code: " . $ex->getCode() . "\n";
        }

    }


    public function guardar($dataPost) {

        $session = new Container('user');

        if ($session && $session->username) {
            $url_foto = $session->url_perfil;
        }else{
            $url_foto = "public/img/perfil/";
        }


        $usuario_new = $dataPost['registro_usuario_new'];
        $cuenta_banco_new = $dataPost['registro_cuenta_new'];
        $suscripcion_new = $dataPost['suscripcion'];
        $tipo_pago = $dataPost['tipo_pago'];
        $preferencias = $dataPost['preferencias'];        
        $suscripcion = $dataPost['suscripcion'];
        $objDateTime = new \DateTime('NOW');




        try{

            $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

            $CrearCuentaBancaria = $this->em->getRepository('ORM\Entity\CuentaBancaria')->guardar($cuenta_banco_new);

            if($CrearCuentaBancaria){
                $CrearUsuario = $this->em->getRepository('ORM\Entity\Usuario')->guardar($usuario_new,$cuenta_banco_new['num_cuenta'],$url_foto);
            }

            if($CrearUsuario){

                $dir[] = $usuario_new['direccion'];
                $dir[] = $cuenta_banco_new['dir_envio_1'];
                $dir[] = $cuenta_banco_new['dir_envio_2'];
                $dir[] = $cuenta_banco_new['dir_envio_3'];

                for ($i=0; $i < 3; $i++) { 
                    
                    if($dir[$i] != ''){
                        $IngresarDirecciones = $this->em->getRepository('ORM\Entity\DireccionesUsuario')->guardar($usuario_new['username'],$dir[$i]);
                    }
                }

                if($dataPost['tipo_cuenta_user'] == 1 || $dataPost['tipo_cuenta_user'] == 2){//usuario
                    $rol = 1;
                }else if($dataPost['tipo_cuenta_user'] == 3){
                    $rol = 2;
                }else if($dataPost['tipo_cuenta_user'] == 4){
                    $rol = 3;
                }else {
                    $rol = 1;
                }


                $Suscripcion = $this->em->getRepository('ORM\Entity\Suscripcion')->guardarReturn(100,15,$suscripcion,1,1,500);//mientras tanto se mandan parametros por defecto, espero el modulo de catalogo

                if(count($Suscripcion) != 0){
                    $CrearCuenta = $this->em->getRepository('ORM\Entity\Cuenta')->guardar($usuario_new['username'],$rol,$Suscripcion,$dataPost['tipo_cuenta_user'],$usuario_new['password']);
                }

                $CrearCuenta = $this->em->getRepository('ORM\Entity\Cuenta')->guardar($id_prefer,$id_cuenta);

            }

            if($CrearCuenta){

                return new JsonModel(array(
                       'error' => false,
                       'mensaje' => 'Registro guardado exitosamente'                         
                   )); 

            }else{

                return new JsonModel(array(
                       'error' => true,
                       'mensaje' => 'Falló la insersion en alguna de las tablas. Por favor intentelo de nuevo.'                         
                   )); 
            }


        } catch (\ORM\Exception\CustomBDException $ex) {

            return new JsonModel(array(
                    'error' => true,
                    'mensaje' => $ex->getMessage(),
                    'code' => $ex->getCode()                         
                ));
        }






/*
      
            $objetoUsuario = new Usuario();

            $idproveedor = $em->getRepository('ORM\Entity\Usuario')->find($dataPost['idProveedor']);



            $objetoUsuario->setUsuariousuarioNickname($usuario_new['username'])
                ->setUsuarioApellidos($usuario_new['apellidos'])
                ->setUsuarioNombres($usuario_new['nombres'])
                ->setUsuarioTipoDoc($usuario_new['tipo_documento'])
                ->setUsuarioNumDoc($usuario_new['documento'])
                ->setUsuarioTelefono($usuario_new['telefono'])
                ->setUsuarioEmail($usuario_new['email'])
                ->setUsuarioFechaRegistro($objDateTime)
                ->setUsuarioFotoPerfil($url_foto)
                ->setUsuarioCuentabanNroCuenta($cuenta_banco_new['num_cuenta']);

            //DE ESTA MANERA PUEDO DISTINGUIR SI ES PARA GUARDAR Y PONER ACTIVO O ES PARA GUARDAR Y PODER SER EDITADO
            if ($dataPost['tipoGuardado'] == 'guardarycerrar') {
                $objetoPedido->setEstado(ESTADO_ACTIVO);
            } elseif ($dataPost['tipoGuardado'] == 'sologuardar') {
                $objetoPedido->setEstado(ESTADO_EN_EDICION);
            }
            $this->em->persist($objetoPedido);

            for ($i = 0; $i < count($dataPost['productos']); $i++) {
                $objPedidoProducto = new PedidoProducto();

                $objProducto = $em->getRepository('ORM\Entity\Producto')->find($dataPost['productos'][$i]['idProducto']);

                $objPedidoProducto->setCantidad($dataPost['productos'][$i]['cantidad'])
                        ->setIdProducto($objProducto)
                        ->setIdPedido($objetoPedido);
                $this->em->persist($objPedidoProducto);
            }
            $this->em->flush();

            */

            return new JsonModel(array(
                'error' => false,
                'data' => '')
            );
       
    }

}
