<?php


namespace ORM\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Suscripcion
 *
 * @ORM\Table(name="suscripcion")
 * @ORM\Entity
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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Cuenta", inversedBy="cuentaSuscripcionSuscripcion")
     * @ORM\JoinTable(name="cuenta_suscripcion",
     *   joinColumns={
     *     @ORM\JoinColumn(name="cuenta_suscripcion_id_suscripcion", referencedColumnName="suscripcion_id_suscripcion")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="cuenta_suscripcion_id_cuenta", referencedColumnName="cuenta_id_cuenta")
     *   }
     * )
     */
    private $cuentaSuscripcionCuenta;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Producto", mappedBy="productoSuscripcionSuscripcion")
     */
    private $productoSuscripcionProducto;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cuentaSuscripcionCuenta = new \Doctrine\Common\Collections\ArrayCollection();
        $this->productoSuscripcionProducto = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Add cuentaSuscripcionCuentum
     *
     * @param \Cuenta $cuentaSuscripcionCuentum
     *
     * @return Suscripcion
     */
    public function addCuentaSuscripcionCuentum(\Cuenta $cuentaSuscripcionCuentum)
    {
        $this->cuentaSuscripcionCuenta[] = $cuentaSuscripcionCuentum;
    
        return $this;
    }

    /**
     * Remove cuentaSuscripcionCuentum
     *
     * @param \Cuenta $cuentaSuscripcionCuentum
     */
    public function removeCuentaSuscripcionCuentum(\Cuenta $cuentaSuscripcionCuentum)
    {
        $this->cuentaSuscripcionCuenta->removeElement($cuentaSuscripcionCuentum);
    }

    /**
     * Get cuentaSuscripcionCuenta
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCuentaSuscripcionCuenta()
    {
        return $this->cuentaSuscripcionCuenta;
    }

    /**
     * Add productoSuscripcionProducto
     *
     * @param \Producto $productoSuscripcionProducto
     *
     * @return Suscripcion
     */
    public function addProductoSuscripcionProducto(\Producto $productoSuscripcionProducto)
    {
        $this->productoSuscripcionProducto[] = $productoSuscripcionProducto;
    
        return $this;
    }

    /**
     * Remove productoSuscripcionProducto
     *
     * @param \Producto $productoSuscripcionProducto
     */
    public function removeProductoSuscripcionProducto(\Producto $productoSuscripcionProducto)
    {
        $this->productoSuscripcionProducto->removeElement($productoSuscripcionProducto);
    }

    /**
     * Get productoSuscripcionProducto
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductoSuscripcionProducto()
    {
        return $this->productoSuscripcionProducto;
    }
}

