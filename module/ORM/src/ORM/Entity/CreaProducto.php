<?php


namespace ORM\Entity;



use Doctrine\ORM\Mapping as ORM;

/**
 * CreaProducto
 *
 * @ORM\Table(name="crea_producto", indexes={@ORM\Index(name="IDX_4E8ED96B85017D9", columns={"cuenta_cuenta_id_cuenta"})})
 * @ORM\Entity
 */
class CreaProducto
{
    /**
     * @var \Cuenta
     *
     * @ORM\ManyToOne(targetEntity="Cuenta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cuenta_cuenta_id_cuenta", referencedColumnName="cuenta_id_cuenta")
     * })
     */
    private $cuentaCuentaCuenta;

    /**
     * @var \Producto
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Producto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="producto_crear_id_producto", referencedColumnName="producto_id_producto")
     * })
     */
    private $productoCrearProducto;


    /**
     * Set cuentaCuentaCuenta
     *
     * @param \Cuenta $cuentaCuentaCuenta
     *
     * @return CreaProducto
     */
    public function setCuentaCuentaCuenta(\Cuenta $cuentaCuentaCuenta = null)
    {
        $this->cuentaCuentaCuenta = $cuentaCuentaCuenta;
    
        return $this;
    }

    /**
     * Get cuentaCuentaCuenta
     *
     * @return \Cuenta
     */
    public function getCuentaCuentaCuenta()
    {
        return $this->cuentaCuentaCuenta;
    }

    /**
     * Set productoCrearProducto
     *
     * @param \Producto $productoCrearProducto
     *
     * @return CreaProducto
     */
    public function setProductoCrearProducto(\Producto $productoCrearProducto)
    {
        $this->productoCrearProducto = $productoCrearProducto;
    
        return $this;
    }

    /**
     * Get productoCrearProducto
     *
     * @return \Producto
     */
    public function getProductoCrearProducto()
    {
        return $this->productoCrearProducto;
    }
}

