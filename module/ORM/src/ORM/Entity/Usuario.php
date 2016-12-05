<?php

namespace ORM\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario", indexes={@ORM\Index(name="IDX_2265B05DE7CF793E", columns={"usuario_cuentaban_nro_cuenta"})})
 * @ORM\Entity(repositoryClass="ORM\Repository\CuentaRepository")
  * @ORM\Entity(repositoryClass="ORM\Repository\UsuarioRepository")
 */
class Usuario
{
    /**
     * @var string
     *
     * @ORM\Column(name="usuario_nickname", type="string", length=50, nullable=false)
     * @ORM\Id
     */
    private $usuarioNickname;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario_nombres", type="string", length=60, nullable=false)
     */
    private $usuarioNombres;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario_apellidos", type="string", length=60, nullable=false)
     */
    private $usuarioApellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario_tipo_doc", type="string", length=30, nullable=false)
     */
    private $usuarioTipoDoc;

    /**
     * @var integer
     *
     * @ORM\Column(name="usuario_num_doc", type="integer", nullable=false)
     */
    private $usuarioNumDoc;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario_telefono", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $usuarioTelefono;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario_email", type="string", length=60, nullable=false)
     */
    private $usuarioEmail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="usuario_fecha_registro", type="date", nullable=false)
     */
    private $usuarioFechaRegistro;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario_foto_perfil", type="string", length=250, nullable=false)
     */
    private $usuarioFotoPerfil;

    /**
     * @var \CuentaBancaria
     *
     * @ORM\ManyToOne(targetEntity="CuentaBancaria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_cuentaban_nro_cuenta", referencedColumnName="cuentaban_nro_cuenta")
     * })
     */
    private $usuarioCuentabanNroCuenta;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Catalogo", inversedBy="agregarDeseoUser")
     * @ORM\JoinTable(name="agregar_deseo",
     *   joinColumns={
     *     @ORM\JoinColumn(name="agregar_deseo_user", referencedColumnName="usuario_nickname")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="agregar_deseo_catalogo_id_catalogo", referencedColumnName="catalogo_id_catalogo")
     *   }
     * )
     */
    private $agregarDeseoCatalogoCatalogo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CompartirCompra", inversedBy="usuarioMeGustaNickname")
     * @ORM\JoinTable(name="me_gusta",
     *   joinColumns={
     *     @ORM\JoinColumn(name="usuario_me_gusta_nickname", referencedColumnName="usuario_nickname")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="me_gusta_compartir_id_compartir", referencedColumnName="compartir_compra_id_compartir")
     *   }
     * )
     */
    private $meGustaCompartirCompartir;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->agregarDeseoCatalogoCatalogo = new \Doctrine\Common\Collections\ArrayCollection();
        $this->meGustaCompartirCompartir = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get usuarioNickname
     *
     * @return string
     */
    public function getUsuarioNickname()
    {
        return $this->usuarioNickname;
    }

    /**
     * Set usuarioNickname
     *
     * @return string
     */
    public function setUsuarioNickname($usuarioNickname)
    {
        $this->usuarioNickname = $usuarioNickname;
        
        return $this;
    }

    /**
     * Set usuarioNombres
     *
     * @param string $usuarioNombres
     *
     * @return Usuario
     */
    public function setUsuarioNombres($usuarioNombres)
    {
        $this->usuarioNombres = $usuarioNombres;
    
        return $this;
    }

    /**
     * Get usuarioNombres
     *
     * @return string
     */
    public function getUsuarioNombres()
    {
        return $this->usuarioNombres;
    }

    /**
     * Set usuarioApellidos
     *
     * @param string $usuarioApellidos
     *
     * @return Usuario
     */
    public function setUsuarioApellidos($usuarioApellidos)
    {
        $this->usuarioApellidos = $usuarioApellidos;
    
        return $this;
    }

    /**
     * Get usuarioApellidos
     *
     * @return string
     */
    public function getUsuarioApellidos()
    {
        return $this->usuarioApellidos;
    }

    /**
     * Set usuarioTipoDoc
     *
     * @param string $usuarioTipoDoc
     *
     * @return Usuario
     */
    public function setUsuarioTipoDoc($usuarioTipoDoc)
    {
        $this->usuarioTipoDoc = $usuarioTipoDoc;
    
        return $this;
    }

    /**
     * Get usuarioTipoDoc
     *
     * @return string
     */
    public function getUsuarioTipoDoc()
    {
        return $this->usuarioTipoDoc;
    }

    /**
     * Set usuarioNumDoc
     *
     * @param integer $usuarioNumDoc
     *
     * @return Usuario
     */
    public function setUsuarioNumDoc($usuarioNumDoc)
    {
        $this->usuarioNumDoc = $usuarioNumDoc;
    
        return $this;
    }

    /**
     * Get usuarioNumDoc
     *
     * @return integer
     */
    public function getUsuarioNumDoc()
    {
        return $this->usuarioNumDoc;
    }

    /**
     * Set usuarioTelefono
     *
     * @param string $usuarioTelefono
     *
     * @return Usuario
     */
    public function setUsuarioTelefono($usuarioTelefono)
    {
        $this->usuarioTelefono = $usuarioTelefono;
    
        return $this;
    }

    /**
     * Get usuarioTelefono
     *
     * @return string
     */
    public function getUsuarioTelefono()
    {
        return $this->usuarioTelefono;
    }

    /**
     * Set usuarioEmail
     *
     * @param string $usuarioEmail
     *
     * @return Usuario
     */
    public function setUsuarioEmail($usuarioEmail)
    {
        $this->usuarioEmail = $usuarioEmail;
    
        return $this;
    }

    /**
     * Get usuarioEmail
     *
     * @return string
     */
    public function getUsuarioEmail()
    {
        return $this->usuarioEmail;
    }

    /**
     * Set usuarioFechaRegistro
     *
     * @param \DateTime $usuarioFechaRegistro
     *
     * @return Usuario
     */
    public function setUsuarioFechaRegistro($usuarioFechaRegistro)
    {
        $this->usuarioFechaRegistro = $usuarioFechaRegistro;
    
        return $this;
    }

    /**
     * Get usuarioFechaRegistro
     *
     * @return \DateTime
     */
    public function getUsuarioFechaRegistro()
    {
        return $this->usuarioFechaRegistro;
    }

    /**
     * Set usuarioFotoPerfil
     *
     * @param string $usuarioFotoPerfil
     *
     * @return Usuario
     */
    public function setUsuarioFotoPerfil($usuarioFotoPerfil)
    {
        $this->usuarioFotoPerfil = $usuarioFotoPerfil;
    
        return $this;
    }

    /**
     * Get usuarioFotoPerfil
     *
     * @return string
     */
    public function getUsuarioFotoPerfil()
    {
        return $this->usuarioFotoPerfil;
    }

    /**
     * Set usuarioCuentabanNroCuenta
     *
     * @param \CuentaBancaria $usuarioCuentabanNroCuenta
     *
     * @return Usuario
     */
    public function setUsuarioCuentabanNroCuenta(CuentaBancaria $usuarioCuentabanNroCuenta = null)
    {
        $this->usuarioCuentabanNroCuenta = $usuarioCuentabanNroCuenta;
    
        return $this;
    }

    /**
     * Get usuarioCuentabanNroCuenta
     *
     * @return \CuentaBancaria
     */
    public function getUsuarioCuentabanNroCuenta()
    {
        return $this->usuarioCuentabanNroCuenta;
    }

    /**
     * Add agregarDeseoCatalogoCatalogo
     *
     * @param \Catalogo $agregarDeseoCatalogoCatalogo
     *
     * @return Usuario
     */
    public function addAgregarDeseoCatalogoCatalogo(\Catalogo $agregarDeseoCatalogoCatalogo)
    {
        $this->agregarDeseoCatalogoCatalogo[] = $agregarDeseoCatalogoCatalogo;
    
        return $this;
    }

    /**
     * Remove agregarDeseoCatalogoCatalogo
     *
     * @param \Catalogo $agregarDeseoCatalogoCatalogo
     */
    public function removeAgregarDeseoCatalogoCatalogo(\Catalogo $agregarDeseoCatalogoCatalogo)
    {
        $this->agregarDeseoCatalogoCatalogo->removeElement($agregarDeseoCatalogoCatalogo);
    }

    /**
     * Get agregarDeseoCatalogoCatalogo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAgregarDeseoCatalogoCatalogo()
    {
        return $this->agregarDeseoCatalogoCatalogo;
    }

    /**
     * Add meGustaCompartirCompartir
     *
     * @param \CompartirCompra $meGustaCompartirCompartir
     *
     * @return Usuario
     */
    public function addMeGustaCompartirCompartir(\CompartirCompra $meGustaCompartirCompartir)
    {
        $this->meGustaCompartirCompartir[] = $meGustaCompartirCompartir;
    
        return $this;
    }

    /**
     * Remove meGustaCompartirCompartir
     *
     * @param \CompartirCompra $meGustaCompartirCompartir
     */
    public function removeMeGustaCompartirCompartir(\CompartirCompra $meGustaCompartirCompartir)
    {
        $this->meGustaCompartirCompartir->removeElement($meGustaCompartirCompartir);
    }

    /**
     * Get meGustaCompartirCompartir
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMeGustaCompartirCompartir()
    {
        return $this->meGustaCompartirCompartir;
    }
}

