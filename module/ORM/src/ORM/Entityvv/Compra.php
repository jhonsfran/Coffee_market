<?php

namespace ORM\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Compra
 *
 * @ORM\Table(name="compra")
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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Catalogo", mappedBy="catalogoCompraCompra")
     */
    private $catalogoCompraCatalogo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Usuario", inversedBy="usuarioCompraCompra")
     * @ORM\JoinTable(name="usuario_compra",
     *   joinColumns={
     *     @ORM\JoinColumn(name="usuario_compra_id_compra", referencedColumnName="compra_id_compra")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="usuario_compra_nickname", referencedColumnName="usuario_nickname")
     *   }
     * )
     */
    private $usuarioCompraNickname;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->catalogoCompraCatalogo = new \Doctrine\Common\Collections\ArrayCollection();
        $this->usuarioCompraNickname = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Add catalogoCompraCatalogo
     *
     * @param \Catalogo $catalogoCompraCatalogo
     *
     * @return Compra
     */
    public function addCatalogoCompraCatalogo(\Catalogo $catalogoCompraCatalogo)
    {
        $this->catalogoCompraCatalogo[] = $catalogoCompraCatalogo;
    
        return $this;
    }

    /**
     * Remove catalogoCompraCatalogo
     *
     * @param \Catalogo $catalogoCompraCatalogo
     */
    public function removeCatalogoCompraCatalogo(\Catalogo $catalogoCompraCatalogo)
    {
        $this->catalogoCompraCatalogo->removeElement($catalogoCompraCatalogo);
    }

    /**
     * Get catalogoCompraCatalogo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCatalogoCompraCatalogo()
    {
        return $this->catalogoCompraCatalogo;
    }

    /**
     * Add usuarioCompraNickname
     *
     * @param \Usuario $usuarioCompraNickname
     *
     * @return Compra
     */
    public function addUsuarioCompraNickname(\Usuario $usuarioCompraNickname)
    {
        $this->usuarioCompraNickname[] = $usuarioCompraNickname;
    
        return $this;
    }

    /**
     * Remove usuarioCompraNickname
     *
     * @param \Usuario $usuarioCompraNickname
     */
    public function removeUsuarioCompraNickname(\Usuario $usuarioCompraNickname)
    {
        $this->usuarioCompraNickname->removeElement($usuarioCompraNickname);
    }

    /**
     * Get usuarioCompraNickname
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsuarioCompraNickname()
    {
        return $this->usuarioCompraNickname;
    }
}

