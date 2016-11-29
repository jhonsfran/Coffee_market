<?php


namespace ORM\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity(repositoryClass="ORM\Repository\UsuarioRepository")
 */
class Usuario
{
    /**
     * @var string
     *
     * @ORM\Column(name="usuario_nickname", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="usuario_usuario_nickname_seq", allocationSize=1, initialValue=1)
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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Catalogo", mappedBy="usuariocatNickname")
     */
    private $usuariocatCatalogo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Compra", mappedBy="usuarioCompraNickname")
     */
    private $usuarioCompraCompra;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->meGustaCompartirCompartir = new \Doctrine\Common\Collections\ArrayCollection();
        $this->usuariocatCatalogo = new \Doctrine\Common\Collections\ArrayCollection();
        $this->usuarioCompraCompra = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get meGustaCompartirCompartir
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMeGustaCompartirCompartir()
    {
        return $this->meGustaCompartirCompartir;
    }


    /**
     * Get usuariocatCatalogo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsuariocatCatalogo()
    {
        return $this->usuariocatCatalogo;
    }


    /**
     * Get usuarioCompraCompra
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsuarioCompraCompra()
    {
        return $this->usuarioCompraCompra;
    }
}

