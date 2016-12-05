<?php


namespace ORM\Entity;



use Doctrine\ORM\Mapping as ORM;

/**
 * Compra
 *
 * @ORM\Table(name="compra", indexes={@ORM\Index(name="IDX_9EC131FFF337B883", columns={"catalogo_compra_id_catalogo"}), @ORM\Index(name="IDX_9EC131FFCAC75F43", columns={"domicilio_compra_id_domicilio"}), @ORM\Index(name="IDX_9EC131FF27D224E1", columns={"usuario_compra_nickname"})})
 * @ORM\Entity
 */
class Compra
{
    /**
     * @var integer
     *
     * @ORM\Column(name="compra_id_compra", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="compra_compra_id_compra_seq", allocationSize=1, initialValue=1)
     */
    private $compraIdCompra;

    /**
     * @var boolean
     *
     * @ORM\Column(name="compra_estado", type="boolean", nullable=false)
     */
    private $compraEstado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="compra_fecha", type="date", nullable=false)
     */
    private $compraFecha;

    /**
     * @var \Catalogo
     *
     * @ORM\ManyToOne(targetEntity="Catalogo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="catalogo_compra_id_catalogo", referencedColumnName="catalogo_id_catalogo")
     * })
     */
    private $catalogoCompraCatalogo;

    /**
     * @var \Domicilio
     *
     * @ORM\ManyToOne(targetEntity="Domicilio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="domicilio_compra_id_domicilio", referencedColumnName="domicilio_id_domicilio")
     * })
     */
    private $domicilioCompraDomicilio;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_compra_nickname", referencedColumnName="usuario_nickname")
     * })
     */
    private $usuarioCompraNickname;


    /**
     * Get compraIdCompra
     *
     * @return integer
     */
    public function getCompraIdCompra()
    {
        return $this->compraIdCompra;
    }

    /**
     * Set compraEstado
     *
     * @param boolean $compraEstado
     *
     * @return Compra
     */
    public function setCompraEstado($compraEstado)
    {
        $this->compraEstado = $compraEstado;
    
        return $this;
    }

    /**
     * Get compraEstado
     *
     * @return boolean
     */
    public function getCompraEstado()
    {
        return $this->compraEstado;
    }

    /**
     * Set compraFecha
     *
     * @param \DateTime $compraFecha
     *
     * @return Compra
     */
    public function setCompraFecha($compraFecha)
    {
        $this->compraFecha = $compraFecha;
    
        return $this;
    }

    /**
     * Get compraFecha
     *
     * @return \DateTime
     */
    public function getCompraFecha()
    {
        return $this->compraFecha;
    }

    /**
     * Set catalogoCompraCatalogo
     *
     * @param \Catalogo $catalogoCompraCatalogo
     *
     * @return Compra
     */
    public function setCatalogoCompraCatalogo(\Catalogo $catalogoCompraCatalogo = null)
    {
        $this->catalogoCompraCatalogo = $catalogoCompraCatalogo;
    
        return $this;
    }

    /**
     * Get catalogoCompraCatalogo
     *
     * @return \Catalogo
     */
    public function getCatalogoCompraCatalogo()
    {
        return $this->catalogoCompraCatalogo;
    }

    /**
     * Set domicilioCompraDomicilio
     *
     * @param \Domicilio $domicilioCompraDomicilio
     *
     * @return Compra
     */
    public function setDomicilioCompraDomicilio(\Domicilio $domicilioCompraDomicilio = null)
    {
        $this->domicilioCompraDomicilio = $domicilioCompraDomicilio;
    
        return $this;
    }

    /**
     * Get domicilioCompraDomicilio
     *
     * @return \Domicilio
     */
    public function getDomicilioCompraDomicilio()
    {
        return $this->domicilioCompraDomicilio;
    }

    /**
     * Set usuarioCompraNickname
     *
     * @param \Usuario $usuarioCompraNickname
     *
     * @return Compra
     */
    public function setUsuarioCompraNickname(\Usuario $usuarioCompraNickname = null)
    {
        $this->usuarioCompraNickname = $usuarioCompraNickname;
    
        return $this;
    }

    /**
     * Get usuarioCompraNickname
     *
     * @return \Usuario
     */
    public function getUsuarioCompraNickname()
    {
        return $this->usuarioCompraNickname;
    }
}

