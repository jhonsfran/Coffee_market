<?php


namespace ORM\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Producto
 *
 * @ORM\Table(name="producto")
 * @ORM\Entity
 */
class Producto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="producto_id_producto", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="producto_producto_id_producto_seq", allocationSize=1, initialValue=1)
     */
    private $productoIdProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="producto_nombre", type="string", length=150, nullable=false)
     */
    private $productoNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="producto_descripcion", type="string", length=250, nullable=false)
     */
    private $productoDescripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="producto_foto", type="string", length=250, nullable=false)
     */
    private $productoFoto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="producto_fecha_creacion", type="date", nullable=false)
     */
    private $productoFechaCreacion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="producto_estado", type="boolean", nullable=false)
     */
    private $productoEstado;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OtroTipoProducto", inversedBy="productoOtrosProducto")
     * @ORM\JoinTable(name="otros",
     *   joinColumns={
     *     @ORM\JoinColumn(name="producto_otros_id_producto", referencedColumnName="producto_id_producto")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="otro_tipo_id_otro_tipo", referencedColumnName="otro_tipo_producto_id_otro_tipo")
     *   }
     * )
     */
    private $otroTipoOtroTipo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Suscripcion", inversedBy="productoSuscripcionProducto")
     * @ORM\JoinTable(name="suscripcion_producto",
     *   joinColumns={
     *     @ORM\JoinColumn(name="producto_suscripcion_id_producto", referencedColumnName="producto_id_producto")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="producto_suscripcion_id_suscripcion", referencedColumnName="suscripcion_id_suscripcion")
     *   }
     * )
     */
    private $productoSuscripcionSuscripcion;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->otroTipoOtroTipo = new \Doctrine\Common\Collections\ArrayCollection();
        $this->productoSuscripcionSuscripcion = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get productoIdProducto
     *
     * @return integer
     */
    public function getProductoIdProducto()
    {
        return $this->productoIdProducto;
    }

    /**
     * Set productoNombre
     *
     * @param string $productoNombre
     *
     * @return Producto
     */
    public function setProductoNombre($productoNombre)
    {
        $this->productoNombre = $productoNombre;
    
        return $this;
    }

    /**
     * Get productoNombre
     *
     * @return string
     */
    public function getProductoNombre()
    {
        return $this->productoNombre;
    }

    /**
     * Set productoDescripcion
     *
     * @param string $productoDescripcion
     *
     * @return Producto
     */
    public function setProductoDescripcion($productoDescripcion)
    {
        $this->productoDescripcion = $productoDescripcion;
    
        return $this;
    }

    /**
     * Get productoDescripcion
     *
     * @return string
     */
    public function getProductoDescripcion()
    {
        return $this->productoDescripcion;
    }

    /**
     * Set productoFoto
     *
     * @param string $productoFoto
     *
     * @return Producto
     */
    public function setProductoFoto($productoFoto)
    {
        $this->productoFoto = $productoFoto;
    
        return $this;
    }

    /**
     * Get productoFoto
     *
     * @return string
     */
    public function getProductoFoto()
    {
        return $this->productoFoto;
    }

    /**
     * Set productoFechaCreacion
     *
     * @param \DateTime $productoFechaCreacion
     *
     * @return Producto
     */
    public function setProductoFechaCreacion($productoFechaCreacion)
    {
        $this->productoFechaCreacion = $productoFechaCreacion;
    
        return $this;
    }

    /**
     * Get productoFechaCreacion
     *
     * @return \DateTime
     */
    public function getProductoFechaCreacion()
    {
        return $this->productoFechaCreacion;
    }

    /**
     * Set productoEstado
     *
     * @param boolean $productoEstado
     *
     * @return Producto
     */
    public function setProductoEstado($productoEstado)
    {
        $this->productoEstado = $productoEstado;
    
        return $this;
    }

    /**
     * Get productoEstado
     *
     * @return boolean
     */
    public function getProductoEstado()
    {
        return $this->productoEstado;
    }

    /**
     * Add otroTipoOtroTipo
     *
     * @param \OtroTipoProducto $otroTipoOtroTipo
     *
     * @return Producto
     */
    public function addOtroTipoOtroTipo(\OtroTipoProducto $otroTipoOtroTipo)
    {
        $this->otroTipoOtroTipo[] = $otroTipoOtroTipo;
    
        return $this;
    }

    /**
     * Remove otroTipoOtroTipo
     *
     * @param \OtroTipoProducto $otroTipoOtroTipo
     */
    public function removeOtroTipoOtroTipo(\OtroTipoProducto $otroTipoOtroTipo)
    {
        $this->otroTipoOtroTipo->removeElement($otroTipoOtroTipo);
    }

    /**
     * Get otroTipoOtroTipo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOtroTipoOtroTipo()
    {
        return $this->otroTipoOtroTipo;
    }

    /**
     * Add productoSuscripcionSuscripcion
     *
     * @param \Suscripcion $productoSuscripcionSuscripcion
     *
     * @return Producto
     */
    public function addProductoSuscripcionSuscripcion(\Suscripcion $productoSuscripcionSuscripcion)
    {
        $this->productoSuscripcionSuscripcion[] = $productoSuscripcionSuscripcion;
    
        return $this;
    }

    /**
     * Remove productoSuscripcionSuscripcion
     *
     * @param \Suscripcion $productoSuscripcionSuscripcion
     */
    public function removeProductoSuscripcionSuscripcion(\Suscripcion $productoSuscripcionSuscripcion)
    {
        $this->productoSuscripcionSuscripcion->removeElement($productoSuscripcionSuscripcion);
    }

    /**
     * Get productoSuscripcionSuscripcion
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductoSuscripcionSuscripcion()
    {
        return $this->productoSuscripcionSuscripcion;
    }
}

