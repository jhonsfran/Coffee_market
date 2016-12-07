<?php


namespace ORM\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Suscripcion
 *
 * @ORM\Table(name="suscripcion", indexes={@ORM\Index(name="IDX_497FA01BACFB98", columns={"suscripcion_producto_id_producto"}), @ORM\Index(name="IDX_497FA0455593FB", columns={"suscripcion_tipo_id"})})
 * @ORM\Entity(repositoryClass="ORM\Repository\CuentaRepository")
  * @ORM\Entity(repositoryClass="ORM\Repository\SuscripcionRepository")
 */
class Suscripcion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="suscripcion_id_suscripcion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="suscripcion_suscripcion_id_suscripcion_seq", allocationSize=1, initialValue=1)
     */
    private $suscripcionIdSuscripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="suscripcion_fecha", type="date", nullable=false)
     */
    private $suscripcionFecha;

    /**
     * @var boolean
     *
     * @ORM\Column(name="suscripcion_estado", type="boolean", nullable=false)
     */
    private $suscripcionEstado;

    /**
     * @var integer
     *
     * @ORM\Column(name="suscripcion_cantidad", type="integer", nullable=false)
     */
    private $suscripcionCantidad;

    /**
     * @var integer
     *
     * @ORM\Column(name="suscripcion_precio", type="integer", nullable=false)
     */
    private $suscripcionPrecio;

    /**
     * @var integer
     *
     * @ORM\Column(name="suscripcion_periodicidad", type="integer", nullable=false)
     */
    private $suscripcionPeriodicidad;

    /**
     * @var \Producto
     *
     * @ORM\ManyToOne(targetEntity="Producto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="suscripcion_producto_id_producto", referencedColumnName="producto_id_producto")
     * })
     */
    private $suscripcionProductoProducto;

    /**
     * @var \TipoSuscripcion
     *
     * @ORM\ManyToOne(targetEntity="TipoSuscripcion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="suscripcion_tipo_id", referencedColumnName="tp_suscri_id")
     * })
     */
    private $suscripcionTipo;


    /**
     * Get suscripcionIdSuscripcion
     *
     * @return integer
     */
    public function getSuscripcionIdSuscripcion()
    {
        return $this->suscripcionIdSuscripcion;
    }

    /**
     * Set suscripcionFecha
     *
     * @param \DateTime $suscripcionFecha
     *
     * @return Suscripcion
     */
    public function setSuscripcionFecha($suscripcionFecha)
    {
        $this->suscripcionFecha = $suscripcionFecha;
    
        return $this;
    }

    /**
     * Get suscripcionFecha
     *
     * @return \DateTime
     */
    public function getSuscripcionFecha()
    {
        return $this->suscripcionFecha;
    }

    /**
     * Set suscripcionEstado
     *
     * @param boolean $suscripcionEstado
     *
     * @return Suscripcion
     */
    public function setSuscripcionEstado($suscripcionEstado)
    {
        $this->suscripcionEstado = $suscripcionEstado;
    
        return $this;
    }

    /**
     * Get suscripcionEstado
     *
     * @return boolean
     */
    public function getSuscripcionEstado()
    {
        return $this->suscripcionEstado;
    }

    /**
     * Set suscripcionCantidad
     *
     * @param integer $suscripcionCantidad
     *
     * @return Suscripcion
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
     * Set suscripcionPrecio
     *
     * @param integer $suscripcionPrecio
     *
     * @return Suscripcion
     */
    public function setSuscripcionPrecio($suscripcionPrecio)
    {
        $this->suscripcionPrecio = $suscripcionPrecio;
    
        return $this;
    }

    /**
     * Get suscripcionPrecio
     *
     * @return integer
     */
    public function getSuscripcionPrecio()
    {
        return $this->suscripcionPrecio;
    }

    /**
     * Set suscripcionPeriodicidad
     *
     * @param integer $suscripcionPeriodicidad
     *
     * @return Suscripcion
     */
    public function setSuscripcionPeriodicidad($suscripcionPeriodicidad)
    {
        $this->suscripcionPeriodicidad = $suscripcionPeriodicidad;
    
        return $this;
    }

    /**
     * Get suscripcionPeriodicidad
     *
     * @return integer
     */
    public function getSuscripcionPeriodicidad()
    {
        return $this->suscripcionPeriodicidad;
    }

    /**
     * Set suscripcionProductoProducto
     *
     * @param \Producto $suscripcionProductoProducto
     *
     * @return Suscripcion
     */
    public function setSuscripcionProductoProducto(Producto $suscripcionProductoProducto = null)
    {
        $this->suscripcionProductoProducto = $suscripcionProductoProducto;
    
        return $this;
    }

    /**
     * Get suscripcionProductoProducto
     *
     * @return \Producto
     */
    public function getSuscripcionProductoProducto()
    {
        return $this->suscripcionProductoProducto;
    }

    /**
     * Set suscripcionTipo
     *
     * @param \TipoSuscripcion $suscripcionTipo
     *
     * @return Suscripcion
     */
    public function setSuscripcionTipo(TipoSuscripcion $suscripcionTipo = null)
    {
        $this->suscripcionTipo = $suscripcionTipo;
    
        return $this;
    }

    /**
     * Get suscripcionTipo
     *
     * @return \TipoSuscripcion
     */
    public function getSuscripcionTipo()
    {
        return $this->suscripcionTipo;
    }
}

