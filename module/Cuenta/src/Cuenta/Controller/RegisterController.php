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
use Cuenta\Exception\ErrorException;
use Cuenta\Exception\CustomException;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class RegisterController extends AbstractActionController {

    public function indexAction() {
        return new ViewModel();
    }

}
