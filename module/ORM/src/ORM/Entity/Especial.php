<?php


namespace ORM\Entity;



use Doctrine\ORM\Mapping as ORM;

/**
 * Especial
 *
 * @ORM\Table(name="especial")
 * @ORM\Entity
 */
class Especial
{
    /**
     * @var string
     *
     * @ORM\Column(name="suscripcion_periodicidad", type="string", length=100, nullable=false)
     */
    private $suscripcionPeriodicidad;

    /**
     * @var string
     *
     * @ORM\Column(name="suscripcion_precio", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $suscripcionPrecio;

    /**
     * @var integer
     *
     * @ORM\Column(name="suscripcion_cantidad", type="integer", nullable=false)
     */
    private $suscripcionCantidad;

    /**
     * @var \Suscripcion
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Suscripcion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="suscripcion_suscripcion_id_suscripcion", referencedColumnName="suscripcion_id_suscripcion")
     * })
     */
    private $suscripcionSuscripcionSuscripcion;


    /**
     * Set suscripcionPeriodicidad
     *
     * @param string $suscripcionPeriodicidad
     *
     * @return Especial
     */
    public function setSuscripcionPeriodicidad($suscripcionPeriodicidad)
    {
        $this->suscripcionPeriodicidad = $suscripcionPeriodicidad;
    
        return $this;
    }

    /**
     * Get suscripcionPeriodicidad
     *
     * @return string
     */
    public function getSuscripcionPeriodicidad()
    {
        return $this->suscripcionPeriodicidad;
    }

    /**
     * Set suscripcionPrecio
     *
     * @param string $suscripcionPrecio
     *
     * @return Especial
     */
    public function setSuscripcionPrecio($suscripcionPrecio)
    {
        $this->suscripcionPrecio = $suscripcionPrecio;
    
        return $this;
    }

    /**
     * Get suscripcionPrecio
     *
     * @return string
     */
    public function getSuscripcionPrecio()
    {
        return $this->suscripcionPrecio;
    }

    /**
     * Set suscripcionCantidad
     *
     * @param integer $suscripcionCantidad
     *
     * @return Especial
     */
    public function setSuscripcionCantidad($suscripcionCantidad)
    {
        $this->suscripcionCantidad = $suscripcionCantidad;
    
        return $this;
    }

    /**
     * Get suscripcionCantidad
     *
     * @return integer
     */
    public function getSuscripcionCantidad()
    {
        return $this->suscripcionCantidad;
    }

    /**
     * Set suscripcionSuscripcionSuscripcion
     *
     * @param \Suscripcion $suscripcionSuscripcionSuscripcion
     *
     * @return Especial
     */
    public function setSuscripcionSuscripcionSuscripcion(\Suscripcion $suscripcionSuscripcionSuscripcion)
    {
        $this->suscripcionSuscripcionSuscripcion = $suscripcionSuscripcionSuscripcion;
    
        return $this;
    }

    /**
     * Get suscripcionSuscripcionSuscripcion
     *
     * @return \Suscripcion
     */
    public function getSuscripcionSuscripcionSuscripcion()
    {
        return $this->suscripcionSuscripcionSuscripcion;
    }
}

