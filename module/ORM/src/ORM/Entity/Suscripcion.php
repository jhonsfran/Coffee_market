<?php


namespace ORM\Entity;



use Doctrine\ORM\Mapping as ORM;

/**
 * Suscripcion
 *
 * @ORM\Table(name="suscripcion", indexes={@ORM\Index(name="IDX_497FA01BACFB98", columns={"suscripcion_producto_id_producto"})})
 * @ORM\Entity(repositoryClass="ORM\Repository\CuentaRepository")
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
     * @var \Producto
     *
     * @ORM\ManyToOne(targetEntity="Producto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="suscripcion_producto_id_producto", referencedColumnName="producto_id_producto")
     * })
     */
    private $suscripcionProductoProducto;


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
     * Set suscripcionProductoProducto
     *
     * @param \Producto $suscripcionProductoProducto
     *
     * @return Suscripcion
     */
    public function setSuscripcionProductoProducto(\Producto $suscripcionProductoProducto = null)
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
}

