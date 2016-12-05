<?php


namespace ORM\Entity;



use Doctrine\ORM\Mapping as ORM;

/**
 * Compartir
 *
 * @ORM\Table(name="compartir", indexes={@ORM\Index(name="IDX_57C70DA48BF94FB8", columns={"compartir_catalogo_id_catalogo"}), @ORM\Index(name="IDX_57C70DA4535E004C", columns={"compartir_usuario_nickname"})})
 * @ORM\Entity
 */
class Compartir
{
    /**
     * @var integer
     *
     * @ORM\Column(name="compartir_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="compartir_compartir_id_seq", allocationSize=1, initialValue=1)
     */
    private $compartirId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="compartir_fecha", type="date", nullable=false)
     */
    private $compartirFecha;

    /**
     * @var \Catalogo
     *
     * @ORM\ManyToOne(targetEntity="Catalogo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="compartir_catalogo_id_catalogo", referencedColumnName="catalogo_id_catalogo")
     * })
     */
    private $compartirCatalogoCatalogo;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="compartir_usuario_nickname", referencedColumnName="usuario_nickname")
     * })
     */
    private $compartirUsuarioNickname;


    /**
     * Get compartirId
     *
     * @return integer
     */
    public function getCompartirId()
    {
        return $this->compartirId;
    }

    /**
     * Set compartirFecha
     *
     * @param \DateTime $compartirFecha
     *
     * @return Compartir
     */
    public function setCompartirFecha($compartirFecha)
    {
        $this->compartirFecha = $compartirFecha;
    
        return $this;
    }

    /**
     * Get compartirFecha
     *
     * @return \DateTime
     */
    public function getCompartirFecha()
    {
        return $this->compartirFecha;
    }

    /**
     * Set compartirCatalogoCatalogo
     *
     * @param \Catalogo $compartirCatalogoCatalogo
     *
     * @return Compartir
     */
    public function setCompartirCatalogoCatalogo(\Catalogo $compartirCatalogoCatalogo = null)
    {
        $this->compartirCatalogoCatalogo = $compartirCatalogoCatalogo;
    
        return $this;
    }

    /**
     * Get compartirCatalogoCatalogo
     *
     * @return \Catalogo
     */
    public function getCompartirCatalogoCatalogo()
    {
        return $this->compartirCatalogoCatalogo;
    }

    /**
     * Set compartirUsuarioNickname
     *
     * @param \Usuario $compartirUsuarioNickname
     *
     * @return Compartir
     */
    public function setCompartirUsuarioNickname(\Usuario $compartirUsuarioNickname = null)
    {
        $this->compartirUsuarioNickname = $compartirUsuarioNickname;
    
        return $this;
    }

    /**
     * Get compartirUsuarioNickname
     *
     * @return \Usuario
     */
    public function getCompartirUsuarioNickname()
    {
        return $this->compartirUsuarioNickname;
    }
}

