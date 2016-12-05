<?php
namespace Cuenta\Exception;
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
    const SIN_RESULTADOS_NUM_FACTURA = 851001;
    const REGISTRO_DUPLICADO = 851002;
    const NUMERO_FACTURA_COMPRA_EXISTE = 851003;
    /*fin error usuario */

    function __construct($codigoError = self::THROW_NONE) {

        switch ($codigoError) {
            case self::CONSULTA_SIN_RESULTADOS:
                throw new CustomException('Consulta sin resultados', 851000);
                break;
            case self::REGISTRO_DUPLICADO:
                throw new CustomException('Registro Duplicado', 851002);
                break;
            default:
                // No exception, object will be created.
                $this->var = $codigoError;
                break;
        }
    }

}
