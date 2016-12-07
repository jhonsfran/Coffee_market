<?php


namespace ORM\Entity;



use Doctrine\ORM\Mapping as ORM;

/**
 * Cuenta
 *
 * @ORM\Table(name="cuenta", indexes={@ORM\Index(name="IDX_31C7BFCF853AC6A6", columns={"cuenta_suscripcion_id"}), @ORM\Index(name="IDX_31C7BFCF38785AF9", columns={"cuenta_tipo_id"}), @ORM\Index(name="IDX_31C7BFCF78AA3E88", columns={"cuenta_username"}), @ORM\Index(name="IDX_31C7BFCF3FE2BB22", columns={"cuenta_rol_id"})})
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
     * @var string
     *
     * @ORM\Column(name="cuenta_nivel", type="string", length=50, nullable=false)
     */
    private $cuentaNivel;

    /**
     * @var string
     *
     * @ORM\Column(name="cuenta_reputacion", type="string", length=50, nullable=false)
     */
    private $cuentaReputacion;

    /**
     * @var string
     *
     * @ORM\Column(name="cuenta_expe", type="string", length=50, nullable=false)
     */
    private $cuentaExpe;

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
     * @var \TipoCuenta
     *
     * @ORM\ManyToOne(targetEntity="TipoCuenta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cuenta_tipo_id", referencedColumnName="tipo_cuenta_id_tipo")
     * })
     */
    private $cuentaTipo;

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
     *   @ORM\JoinColumn(name="cuenta_rol_id", referencedColumnName="rol_id_rol")
     * })
     */
    private $cuentaRol;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Pqrs", inversedBy="respondeCuentaCuenta")
     * @ORM\JoinTable(name="responde",
     *   joinColumns={
     *     @ORM\JoinColumn(name="responde_cuenta_id_cuenta", referencedColumnName="cuenta_id_cuenta")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="responde_pqrs_id_pgrs", referencedColumnName="pqrs_id_pgrs")
     *   }
     * )
     */
    private $respondePqrsPgrs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Pqrs", mappedBy="realizacuentaCuenta")
     */
    private $realizapqrsPgrs;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->respondePqrsPgrs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->realizapqrsPgrs = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set cuentaNivel
     *
     * @param string $cuentaNivel
     *
     * @return Cuenta
     */
    public function setCuentaNivel($cuentaNivel)
    {
        $this->cuentaNivel = $cuentaNivel;
    
        return $this;
    }

    /**
     * Get cuentaNivel
     *
     * @return string
     */
    public function getCuentaNivel()
    {
        return $this->cuentaNivel;
    }

    /**
     * Set cuentaReputacion
     *
     * @param string $cuentaReputacion
     *
     * @return Cuenta
     */
    public function setCuentaReputacion($cuentaReputacion)
    {
        $this->cuentaReputacion = $cuentaReputacion;
    
        return $this;
    }

    /**
     * Get cuentaReputacion
     *
     * @return string
     */
    public function getCuentaReputacion()
    {
        return $this->cuentaReputacion;
    }

    /**
     * Set cuentaExpe
     *
     * @param string $cuentaExpe
     *
     * @return Cuenta
     */
    public function setCuentaExpe($cuentaExpe)
    {
        $this->cuentaExpe = $cuentaExpe;
    
        return $this;
    }

    /**
     * Get cuentaExpe
     *
     * @return string
     */
    public function getCuentaExpe()
    {
        return $this->cuentaExpe;
    }

    /**
     * Set cuentaSuscripcion
     *
     * @param \Suscripcion $cuentaSuscripcion
     *
     * @return Cuenta
     */
    public function setCuentaSuscripcion(Suscripcion $cuentaSuscripcion = null)
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

    /**
     * Set cuentaTipo
     *
     * @param \TipoCuenta $cuentaTipo
     *
     * @return Cuenta
     */
    public function setCuentaTipo(TipoCuenta $cuentaTipo = null)
    {
        $this->cuentaTipo = $cuentaTipo;
    
        return $this;
    }

    /**
     * Get cuentaTipo
     *
     * @return \TipoCuenta
     */
    public function getCuentaTipo()
    {
        return $this->cuentaTipo;
    }

    /**
     * Set cuentaUsername
     *
     * @param \Usuario $cuentaUsername
     *
     * @return Cuenta
     */
    public function setCuentaUsername(Usuario $cuentaUsername = null)
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
    public function setCuentaRol(Rol $cuentaRol = null)
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
     * Add respondePqrsPgr
     *
     * @param \Pqrs $respondePqrsPgr
     *
     * @return Cuenta
     */
    public function addRespondePqrsPgr(Pqrs $respondePqrsPgr)
    {
        $this->respondePqrsPgrs[] = $respondePqrsPgr;
    
        return $this;
    }

    /**
     * Remove respondePqrsPgr
     *
     * @param \Pqrs $respondePqrsPgr
     */
    public function removeRespondePqrsPgr(Pqrs $respondePqrsPgr)
    {
        $this->respondePqrsPgrs->removeElement($respondePqrsPgr);
    }

    /**
     * Get respondePqrsPgrs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRespondePqrsPgrs()
    {
        return $this->respondePqrsPgrs;
    }

    /**
     * Add realizapqrsPgr
     *
     * @param \Pqrs $realizapqrsPgr
     *
     * @return Cuenta
     */
    public function addRealizapqrsPgr(Pqrs $realizapqrsPgr)
    {
        $this->realizapqrsPgrs[] = $realizapqrsPgr;
    
        return $this;
    }

    /**
     * Remove realizapqrsPgr
     *
     * @param \Pqrs $realizapqrsPgr
     */
    public function removeRealizapqrsPgr(Pqrs $realizapqrsPgr)
    {
        $this->realizapqrsPgrs->removeElement($realizapqrsPgr);
    }

    /**
     * Get realizapqrsPgrs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRealizapqrsPgrs()
    {
        return $this->realizapqrsPgrs;
    }
}

