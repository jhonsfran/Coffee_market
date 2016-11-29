<?php

namespace ORM\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Cuenta
 *
 * @ORM\Table(name="cuenta", indexes={@ORM\Index(name="IDX_31C7BFCF78AA3E88", columns={"cuenta_username"}), @ORM\Index(name="IDX_31C7BFCF76772003", columns={"cuenta_rol"}), @ORM\Index(name="IDX_31C7BFCF853AC6A6", columns={"cuenta_suscripcion_id"})})
 * @ORM\Entity(repositoryClass="ORM\Repository\CuentaRepository")
 */
class Cuenta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cuenta_id_cuenta", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cuenta_cuenta_id_cuenta_seq", allocationSize=1, initialValue=1)
     */
    private $cuentaIdCuenta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cuenta_fecha_creacion", type="date", nullable=false)
     */
    private $cuentaFechaCreacion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cuenta_estado", type="boolean", nullable=false)
     */
    private $cuentaEstado;

    /**
     * @var integer
     *
     * @ORM\Column(name="cuenta_acumulador_puntos", type="integer", nullable=false)
     */
    private $cuentaAcumuladorPuntos;

    /**
     * @var string
     *
     * @ORM\Column(name="cuenta_password", type="string", length=60, nullable=false)
     */
    private $cuentaPassword;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cuenta_username", referencedColumnName="usuario_nickname")
     * })
     */
    private $cuentaUsername;

    /**
     * @var \Rol
     *
     * @ORM\ManyToOne(targetEntity="Rol")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cuenta_rol", referencedColumnName="rol_id_rol")
     * })
     */
    private $cuentaRol;

    /**
     * @var \Suscripcion
     *
     * @ORM\ManyToOne(targetEntity="Suscripcion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cuenta_suscripcion_id", referencedColumnName="suscripcion_id_suscripcion")
     * })
     */
    private $cuentaSuscripcion;


    /**
     * Get cuentaIdCuenta
     *
     * @return integer
     */
    public function getCuentaIdCuenta()
    {
        return $this->cuentaIdCuenta;
    }

    /**
     * Set cuentaFechaCreacion
     *
     * @param \DateTime $cuentaFechaCreacion
     *
     * @return Cuenta
     */
    public function setCuentaFechaCreacion($cuentaFechaCreacion)
    {
        $this->cuentaFechaCreacion = $cuentaFechaCreacion;
    
        return $this;
    }

    /**
     * Get cuentaFechaCreacion
     *
     * @return \DateTime
     */
    public function getCuentaFechaCreacion()
    {
        return $this->cuentaFechaCreacion;
    }

    /**
     * Set cuentaEstado
     *
     * @param boolean $cuentaEstado
     *
     * @return Cuenta
     */
    public function setCuentaEstado($cuentaEstado)
    {
        $this->cuentaEstado = $cuentaEstado;
    
        return $this;
    }

    /**
     * Get cuentaEstado
     *
     * @return boolean
     */
    public function getCuentaEstado()
    {
        return $this->cuentaEstado;
    }

    /**
     * Set cuentaAcumuladorPuntos
     *
     * @param integer $cuentaAcumuladorPuntos
     *
     * @return Cuenta
     */
    public function setCuentaAcumuladorPuntos($cuentaAcumuladorPuntos)
    {
        $this->cuentaAcumuladorPuntos = $cuentaAcumuladorPuntos;
    
        return $this;
    }

    /**
     * Get cuentaAcumuladorPuntos
     *
     * @return integer
     */
    public function getCuentaAcumuladorPuntos()
    {
        return $this->cuentaAcumuladorPuntos;
    }

    /**
     * Set cuentaPassword
     *
     * @param string $cuentaPassword
     *
     * @return Cuenta
     */
    public function setCuentaPassword($cuentaPassword)
    {
        $this->cuentaPassword = $cuentaPassword;
    
        return $this;
    }

    /**
     * Get cuentaPassword
     *
     * @return string
     */
    public function getCuentaPassword()
    {
        return $this->cuentaPassword;
    }

    /**
     * Set cuentaUsername
     *
     * @param \Usuario $cuentaUsername
     *
     * @return Cuenta
     */
    public function setCuentaUsername(\Usuario $cuentaUsername = null)
    {
        $this->cuentaUsername = $cuentaUsername;
    
        return $this;
    }

    /**
     * Get cuentaUsername
     *
     * @return \Usuario
     */
    public function getCuentaUsername()
    {
        return $this->cuentaUsername;
    }

    /**
     * Set cuentaRol
     *
     * @param \Rol $cuentaRol
     *
     * @return Cuenta
     */
    public function setCuentaRol(\Rol $cuentaRol = null)
    {
        $this->cuentaRol = $cuentaRol;
    
        return $this;
    }

    /**
     * Get cuentaRol
     *
     * @return \Rol
     */
    public function getCuentaRol()
    {
        return $this->cuentaRol;
    }

    /**
     * Set cuentaSuscripcion
     *
     * @param \Suscripcion $cuentaSuscripcion
     *
     * @return Cuenta
     */
    public function setCuentaSuscripcion(\Suscripcion $cuentaSuscripcion = null)
    {
        $this->cuentaSuscripcion = $cuentaSuscripcion;
    
        return $this;
    }

    /**
     * Get cuentaSuscripcion
     *
     * @return \Suscripcion
     */
    public function getCuentaSuscripcion()
    {
        return $this->cuentaSuscripcion;
    }
}

