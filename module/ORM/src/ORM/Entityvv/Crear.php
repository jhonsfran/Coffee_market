<?php

namespace ORM\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Crear
 *
 * @ORM\Table(name="crear", indexes={@ORM\Index(name="IDX_5577D1AAF679E6D", columns={"administrador_crear_id_admin"}), @ORM\Index(name="IDX_5577D1AAD228D726", columns={"producto_crear_id_producto"}), @ORM\Index(name="IDX_5577D1AAEB9C3761", columns={"proveedor_crear_id_proveedor"})})
 * @ORM\Entity
 */
class Crear
{
    /**
     * @var \Administrador
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Administrador")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="administrador_crear_id_admin", referencedColumnName="administrador_id_admin")
     * })
     */
    private $administradorCrearAdmin;

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
     * @var \Proveedor
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Proveedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="proveedor_crear_id_proveedor", referencedColumnName="proveedor_id_proveedor")
     * })
     */
    private $proveedorCrearProveedor;


    /**
     * Set administradorCrearAdmin
     *
     * @param \Administrador $administradorCrearAdmin
     *
     * @return Crear
     */
    public function setAdministradorCrearAdmin(\Administrador $administradorCrearAdmin)
    {
        $this->administradorCrearAdmin = $administradorCrearAdmin;
    
        return $this;
    }

    /**
     * Get administradorCrearAdmin
     *
     * @return \Administrador
     */
    public function getAdministradorCrearAdmin()
    {
        return $this->administradorCrearAdmin;
    }

    /**
     * Set productoCrearProducto
     *
     * @param \Producto $productoCrearProducto
     *
     * @return Crear
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

    /**
     * Set proveedorCrearProveedor
     *
     * @param \Proveedor $proveedorCrearProveedor
     *
     * @return Crear
     */
    public function setProveedorCrearProveedor(\Proveedor $proveedorCrearProveedor)
    {
        $this->proveedorCrearProveedor = $proveedorCrearProveedor;
    
        return $this;
    }

    /**
     * Get proveedorCrearProveedor
     *
     * @return \Proveedor
     */
    public function getProveedorCrearProveedor()
    {
        return $this->proveedorCrearProveedor;
    }
}

