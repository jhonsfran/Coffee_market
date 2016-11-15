<?php

namespace Application\Utils;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Doctrine\Common\Annotations\AnnotationReader;

/**
 * Description of Utilidades
 *
 * @author andres
 */
class Utilidades {

    /**
     * Retorna el numero de inicio de pagina 
     * @param type $maxregistros
     * @param int $pagina
     * @return type
     */
    public static function getInicioPaginacion($nuMaxRegistros, $pagina) {

        if (!isset($pagina)) {
            $pagina = 1;
            $inicio = 0;
        } else {
            $inicio = ($pagina - 1) * $nuMaxRegistros;
        }
        return $inicio;
    }

    public static function saveEntity($className,&$entity,$data) {
        $class = new \ReflectionClass($className);
        $properties = $class->getProperties();
        $annotacion = new AnnotationReader();
        foreach ($properties AS $value) {
            $objProperties = new \ReflectionProperty($className, $value->name);          
            $anotaciones = $annotacion->getPropertyAnnotations($objProperties);
            $excepciones = array('Id','id','fecha_creacion','fecha_modificacion');
            if(!isset($anotaciones[0]->name) || in_array($anotaciones[0]->name,$excepciones))
                continue;
            $nameProperty = $anotaciones[0]->name;
            //print_r($anotaciones);         
            $set = 'set'.$nameProperty;
            if(!array_key_exists(strtolower($nameProperty), $data))
                $valor = null;
            else
                $valor = $data[strtolower($nameProperty)];   
            switch ($anotaciones[0]->type){
                case 'string':                
                    break;
                case 'integer':
                    $valor = (integer) $valor;
                    break;
                //añadir parseos...
            }
            $entity->$set($valor);
        }    
    }

    public static function getFormly($className) {
        $rcCampo = [];
        $class = new \ReflectionClass($className);
        $properties = $class->getProperties();

        foreach ($properties AS $value) {
            $objProperties = new \ReflectionProperty($className, $value->name);
            $properties = $objProperties->getDocComment();
            $tamCadena = strlen($properties);
            $nuinicio = strpos($properties, '{');
            $nufin = strpos($properties, ')', $nuinicio);
            $formly = substr($properties, $nuinicio, $nufin - $tamCadena);
            $rcFormly = json_decode($formly, true);
//            print_r($rcFormly);
            if (count($rcFormly) != 0) {
                $rcCampo[$value->name] = $rcFormly;
            }
        }
        uasort($rcCampo, array('Application\Utils\Utilidades', "order"));
        return $rcCampo;
    }

    public static function order($a, $b) {
        return strcasecmp($a["position"], $b["position"]);
    }

}
