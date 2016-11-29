<?php
namespace \Exception;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Cuenta\Exception\CustomException;
class ErrorException {

    public $var;

    const THROW_NONE = 0;
    /* Errores del usuario comienzan con el sufijo 85 */
    const CONSULTA_SIN_RESULTADOS = 851000;
    /*fin error usuario */

    function __construct($codigoError = self::THROW_NONE) {

        switch ($codigoError) {
            case self::CONSULTA_SIN_RESULTADOS:
                throw new CustomException('Consulta sin resultados', 851000);
                break;
            default:
                // No exception, object will be created.
                $this->var = $codigoError;
                break;
        }
    }

}
