<?php

namespace ORM\Help;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of helpQuery
 *
 * @author Dev4ndy
 */
use Application\Utils\Utilidades;

class HelpQuery {

    private $qb;

    function __construct() {
        
    }

    function getQb() {
        return $this->qb;
    }

    function setQb($qb) {
        $this->qb = $qb;
    }

    /**
     * Metodo simple de filtro para solo una tabla.
     * @param type $filter La estrucutura es : filter = [{columName: value.name, value: textValue}, ...]
     * @param type $aliasClass alias de la tabla, como se renombro en el query.
     */
    public function setFilterSimple($filter, $aliasClass) {        
        if (!empty($filter['filter'])) {
            $x = true;
            foreach ($filter['filter'] AS $value) {                
                if ($x) {
                    $this->qb->Where(
                            $this->qb->expr()->like($aliasClass . '.' . $value['columName'], $this->qb->expr()->literal('%' . $value['value'] . '%'))
                    );
                } else {
                    $this->qb->andWhere(
                            $this->qb->expr()->like($aliasClass . '.' . $value['columName'], $this->qb->expr()->literal('%' . $value['value'] . '%'))
                            );
                }
                $x = false;
            }
        }
    }

    /**
     * Metodo simple de ordernamiento para solo una tabla.
     * @param type $filter La estructura es sorting = {columName: ?, direction: 'DESC' || 'ASC'}
     * @param type $aliasClass  alias de la tabla, como se renombro en el query.
     * @param type $columOrder columna por default, si no llega sort
     */
    public function setSort($filter, $aliasClass, $columOrder, $direction = 1) {
        if (!empty($filter['sort'])) {
            $this->qb->addOrderBy($aliasClass . '.' . $filter['sort']['columName'], $filter['sort']['direction']);
        } else {
            $this->qb->addOrderBy($aliasClass . '.' . $columOrder, $direction == 1 ? 'ASC' : 'DESC');
        }
    }

    /**
     * Metodo para paginar 
     * @param type $filter La estructura es:  pagination={maxRegistros: }
     */
    public function pagination($filter, $nuMaxResult = 10, $nuInicio = 0) {
        if (key_exists('pagination', $filter)) {
            $filter = $filter['pagination'];
            $nuMaxResult = $filter['maxRegistros'];
            $nuInicio = Utilidades::getInicioPaginacion($nuMaxResult, $filter['pagina']);
        }
        if (!empty($nuInicio)) {
            $this->qb->setFirstResult($nuInicio);
        }
        if (!empty($nuMaxResult)) {
            $this->qb->setMaxResults($nuMaxResult);
        }
    }

}
