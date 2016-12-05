<?php
namespace ORM\Exception;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use ORM\Exception\CustomBDException;
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
                throw new CustomBDException('Consulta sin resultados', 851000);
                break;
             case self::SIN_RESULTADOS_NUM_FACTURA:
                throw new CustomBDException('No hay numeros de facturas disponibles', 851001);
                break;
            case self::REGISTRO_DUPLICADO:
                throw new CustomBDException('Registro Duplicado ', 851002);
                break;
            case self::NUMERO_FACTURA_COMPRA_EXISTE:
                throw new CustomBDException('El numero de factura ya existe', 851003);
                break;
            default:
                // No exception, object will be created.
                $this->var = $codigoError;
                break;
        }
    }

}
