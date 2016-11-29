<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Cuenta;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Cuenta\Controller\LoginController;
use Cuenta\Controller\OlvideController;
use Cuenta\Controller\RegisterController;

class Module implements AutoloaderProviderInterface 
{

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        date_default_timezone_set('America/Bogota');
        //include __DIR__.'/src/Socialcoffee/Define/define.php';
        return include __DIR__ . '/config/module.config.php';
    }

    public function getControllerConfig() {
        return array(
            'factories' => array(
                'Cuenta\Controller\Login' => function ($sm) {
                    return new LoginController($sm->getServiceLocator()->get('Doctrine\ORM\EntityManager'));
                },
                'Cuenta\Controller\Olvide' => function ($sm) {
                    return new OlvideController($sm->getServiceLocator()->get('Doctrine\ORM\EntityManager'));
                },
                'Cuenta\Controller\Register' => function ($sm) {
                    return new RegisterController($sm->getServiceLocator()->get('Doctrine\ORM\EntityManager'));
                },
            ),
        );
    }
}
