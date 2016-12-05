<?php


namespace ORM\Entity;



use Doctrine\ORM\Mapping as ORM;

/**
 * OtroTipoProducto
 *
 * @ORM\Table(name="otro_tipo_producto")
 * @ORM\Entity
 */
class OtroTipoProducto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="otro_tipo_producto_id_otro_tipo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="otro_tipo_producto_otro_tipo_producto_id_otro_tipo_seq", allocationSize=1, initialValue=1)
     */
    private $otroTipoProductoIdOtroTipo;

    /**
     * @var string
     *
     * @ORM\Column(name="otro_tipo_producto_tipo", type="string", length=100, nullable=false)
     */
    private $otroTipoProductoTipo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Producto", mappedBy="otroTipoOtroTipo")
     */
    private $productoOtrosProducto;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productoOtrosProducto = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get otroTipoProductoIdOtroTipo
     *
     * @return integer
     */
    public function getOtroTipoProductoIdOtroTipo()
    {
        return $this->otroTipoProductoIdOtroTipo;
    }

    /**
     * Set otroTipoProductoTipo
     *
     * @param string $otroTipoProductoTipo
     *
     * @return OtroTipoProducto
     */
    public function setOtroTipoProductoTipo($otroTipoProductoTipo)
    {
        $this->otroTipoProductoTipo = $otroTipoProductoTipo;
    
        return $this;
    }

    /**
     * Get otroTipoProductoTipo
     *
     * @return string
     */
    public function getOtroTipoProductoTipo()
    {
        return $this->otroTipoProductoTipo;
    }

    /**
     * Add productoOtrosProducto
     *
     * @param \Producto $productoOtrosProducto
     *
     * @return OtroTipoProducto
     */
    public function addProductoOtrosProducto(\Producto $productoOtrosProducto)
    {
        $this->productoOtrosProducto[] = $productoOtrosProducto;
    
        return $this;
    }

    /**
     * Remove productoOtrosProducto
     *
     * @param \Producto $productoOtrosProducto
     */
    public function removeProductoOtrosProducto(\Producto $productoOtrosProducto)
    {
        $this->productoOtrosProducto->removeElement($productoOtrosProducto);
    }

    /**
     * Get productoOtrosProducto
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductoOtrosProducto()
    {
        return $this->productoOtrosProducto;
    }
}

