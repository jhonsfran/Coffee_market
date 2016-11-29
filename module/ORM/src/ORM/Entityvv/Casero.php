<?php

namespace ORM\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Casero
 *
 * @ORM\Table(name="casero")
 * @ORM\Entity
 */
class Casero
{
    /**
     * @var string
     *
     * @ORM\Column(name="casero_precio", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $caseroPrecio;

    /**
     * @var integer
     *
     * @ORM\Column(name="casero_cantidad", type="integer", nullable=false)
     */
    private $caseroCantidad;

    /**
     * @var \Suscripcion
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Suscripcion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="casero_suscripcion_id_suscripcion", referencedColumnName="suscripcion_id_suscripcion")
     * })
     */
    private $caseroSuscripcionSuscripcion;


    /**
     * Set caseroPrecio
     *
     * @param string $caseroPrecio
     *
     * @return Casero
     */
    public function setCaseroPrecio($caseroPrecio)
    {
        $this->caseroPrecio = $caseroPrecio;
    
        return $this;
    }

    /**
     * Get caseroPrecio
     *
     * @return string
     */
    public function getCaseroPrecio()
    {
        return $this->caseroPrecio;
    }

    /**
     * Set caseroCantidad
     *
     * @param integer $caseroCantidad
     *
     * @return Casero
     */
    public function setCaseroCantidad($caseroCantidad)
    {
        $this->caseroCantidad = $caseroCantidad;
    
        return $this;
    }

    /**
     * Get caseroCantidad
     *
     * @return integer
     */
    public function getCaseroCantidad()
    {
        return $this->caseroCantidad;
    }

    /**
     * Set caseroSuscripcionSuscripcion
     *
     * @param \Suscripcion $caseroSuscripcionSuscripcion
     *
     * @return Casero
     */
    public function setCaseroSuscripcionSuscripcion(\Suscripcion $caseroSuscripcionSuscripcion)
    {
        $this->caseroSuscripcionSuscripcion = $caseroSuscripcionSuscripcion;
    
        return $this;
    }

    /**
     * Get caseroSuscripcionSuscripcion
     *
     * @return \Suscripcion
     */
    public function getCaseroSuscripcionSuscripcion()
    {
        return $this->caseroSuscripcionSuscripcion;
    }
}

