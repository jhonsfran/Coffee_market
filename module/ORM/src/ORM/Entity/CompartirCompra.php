<?php


namespace ORM\Entity;



use Doctrine\ORM\Mapping as ORM;

/**
 * CompartirCompra
 *
 * @ORM\Table(name="compartir_compra", indexes={@ORM\Index(name="IDX_6567310F3E8B60F3", columns={"compartir_compra_id_compra"})})
 * @ORM\Entity
 */
class CompartirCompra
{
    /**
     * @var integer
     *
     * @ORM\Column(name="compartir_compra_id_compartir", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="compartir_compra_compartir_compra_id_compartir_seq", allocationSize=1, initialValue=1)
     */
    private $compartirCompraIdCompartir;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="compartir_compra_fecha", type="date", nullable=false)
     */
    private $compartirCompraFecha;

    /**
     * @var \Compra
     *
     * @ORM\ManyToOne(targetEntity="Compra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="compartir_compra_id_compra", referencedColumnName="compra_id_compra")
     * })
     */
    private $compartirCompraCompra;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Usuario", mappedBy="meGustaCompartirCompartir")
     */
    private $usuarioMeGustaNickname;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->usuarioMeGustaNickname = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get compartirCompraIdCompartir
     *
     * @return integer
     */
    public function getCompartirCompraIdCompartir()
    {
        return $this->compartirCompraIdCompartir;
    }

    /**
     * Set compartirCompraFecha
     *
     * @param \DateTime $compartirCompraFecha
     *
     * @return CompartirCompra
     */
    public function setCompartirCompraFecha($compartirCompraFecha)
    {
        $this->compartirCompraFecha = $compartirCompraFecha;
    
        return $this;
    }

    /**
     * Get compartirCompraFecha
     *
     * @return \DateTime
     */
    public function getCompartirCompraFecha()
    {
        return $this->compartirCompraFecha;
    }

    /**
     * Set compartirCompraCompra
     *
     * @param \Compra $compartirCompraCompra
     *
     * @return CompartirCompra
     */
    public function setCompartirCompraCompra(\Compra $compartirCompraCompra = null)
    {
        $this->compartirCompraCompra = $compartirCompraCompra;
    
        return $this;
    }

    /**
     * Get compartirCompraCompra
     *
     * @return \Compra
     */
    public function getCompartirCompraCompra()
    {
        return $this->compartirCompraCompra;
    }

    /**
     * Add usuarioMeGustaNickname
     *
     * @param \Usuario $usuarioMeGustaNickname
     *
     * @return CompartirCompra
     */
    public function addUsuarioMeGustaNickname(\Usuario $usuarioMeGustaNickname)
    {
        $this->usuarioMeGustaNickname[] = $usuarioMeGustaNickname;
    
        return $this;
    }

    /**
     * Remove usuarioMeGustaNickname
     *
     * @param \Usuario $usuarioMeGustaNickname
     */
    public function removeUsuarioMeGustaNickname(\Usuario $usuarioMeGustaNickname)
    {
        $this->usuarioMeGustaNickname->removeElement($usuarioMeGustaNickname);
    }

    /**
     * Get usuarioMeGustaNickname
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsuarioMeGustaNickname()
    {
        return $this->usuarioMeGustaNickname;
    }
}

