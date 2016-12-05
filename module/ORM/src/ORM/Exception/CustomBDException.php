<?php

namespace ORM\Exception;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CustomBDException
 *
 * @author andres
 */
use Doctrine\DBAL\DBALException;

class CustomBDException extends \Exception {

    // Redefine the exception so message isn't optional
    public function __construct($message, $code = 0) {
        // some code
        // make sure everything is assigned properly
        parent::__construct($message, $code);
    }

    // custom string representation of object
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    public function customFunction() {
        echo "A custom function for this type of exception\n";
    }

    public function getError() {
        $msg = $this->getMessage();
        Logger::Log($msg);
        return $msg;
    }

    //put your code here
}
