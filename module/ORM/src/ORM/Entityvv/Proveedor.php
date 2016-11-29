<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Proveedor
 *
 * @ORM\Table(name="proveedor", indexes={@ORM\Index(name="IDX_16C068CEA5095852", columns={"proveedor_id_cuenta"})})
 * @ORM\Entity
 */
class Proveedor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="proveedor_id_proveedor", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="proveedor_proveedor_id_proveedor_seq", allocationSize=1, initialValue=1)
     */
    private $proveedorIdProveedor;

    /**
     * @var string
     *
     * @ORM\Column(name="proveedor_reputacion", type="string", length=100, nullable=false)
     */
    private $proveedorReputacion;

    /**
     * @var \Cuenta
     *
     * @ORM\ManyToOne(targetEntity="Cuenta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="proveedor_id_cuenta", referencedColumnName="cuenta_id_cuenta")
     * })
     */
    private $proveedorCuenta;


    /**
     * Get proveedorIdProveedor
     *
     * @return integer
     */
    public function getProveedorIdProveedor()
    {
        return $this->proveedorIdProveedor;
    }

    /**
     * Set proveedorReputacion
     *
     * @param string $proveedorReputacion
     *
     * @return Proveedor
     */
    public function setProveedorReputacion($proveedorReputacion)
    {
        $this->proveedorReputacion = $proveedorReputacion;
    
        return $this;
    }

    /**
     * Get proveedorReputacion
     *
     * @return string
     */
    public function getProveedorReputacion()
    {
        return $this->proveedorReputacion;
    }

    /**
     * Set proveedorCuenta
     *
     * @param \Cuenta $proveedorCuenta
     *
     * @return Proveedor
     */
    public function setProveedorCuenta(\Cuenta $proveedorCuenta = null)
    {
        $this->proveedorCuenta = $proveedorCuenta;
    
        return $this;
    }

    /**
     * Get proveedorCuenta
     *
     * @return \Cuenta
     */
    public function getProveedorCuenta()
    {
        return $this->proveedorCuenta;
    }
}

