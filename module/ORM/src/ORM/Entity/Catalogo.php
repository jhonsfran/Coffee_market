<?php

namespace ORM\Entity;

use Doctrine\Common\Collections\ArrayCollection;


use Doctrine\ORM\Mapping as ORM;

/**
 * Catalogo
 *
 * @ORM\Table(name="catalogo")
 * @ORM\Entity
 */
class Catalogo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="catalogo_id_catalogo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="catalogo_catalogo_id_catalogo_seq", allocationSize=1, initialValue=1)
     */
    private $catalogoIdCatalogo;

    /**
     * @var integer
     *
     * @ORM\Column(name="catalogo_cantidad", type="integer", nullable=false)
     */
    private $catalogoCantidad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="catalogo_fecha", type="date", nullable=false)
     */
    private $catalogoFecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="catalogo_descuento", type="integer", nullable=false)
     */
    private $catalogoDescuento;

    /**
     * @var string
     *
     * @ORM\Column(name="catalogo_precio", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $catalogoPrecio;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Compra", inversedBy="catalogoCompraCatalogo")
     * @ORM\JoinTable(name="catalogo_compra",
     *   joinColumns={
     *     @ORM\JoinColumn(name="catalogo_compra_id_catalogo", referencedColumnName="catalogo_id_catalogo")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="catalogo_compra_id_compra", referencedColumnName="compra_id_compra")
     *   }
     * )
     */
    private $catalogoCompraCompra;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Usuario", inversedBy="usuariocatCatalogo")
     * @ORM\JoinTable(name="usuario_catalogo",
     *   joinColumns={
     *     @ORM\JoinColumn(name="usuariocat_id_catalogo", referencedColumnName="catalogo_id_catalogo")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="usuariocat_nickname", referencedColumnName="usuario_nickname")
     *   }
     * )
     */
    private $usuariocatNickname;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->catalogoCompraCompra = new \Doctrine\Common\Collections\ArrayCollection();
        $this->usuariocatNickname = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get catalogoIdCatalogo
     *
     * @return integer
     */
    public function getCatalogoIdCatalogo()
    {
        return $this->catalogoIdCatalogo;
    }

    /**
     * Set catalogoCantidad
     *
     * @param integer $catalogoCantidad
     *
     * @return Catalogo
     */
    public function setCatalogoCantidad($catalogoCantidad)
    {
        $this->catalogoCantidad = $catalogoCantidad;
    
        return $this;
    }

    /**
     * Get catalogoCantidad
     *
     * @return integer
     */
    public function getCatalogoCantidad()
    {
        return $this->catalogoCantidad;
    }

    /**
     * Set catalogoFecha
     *
     * @param \DateTime $catalogoFecha
     *
     * @return Catalogo
     */
    public function setCatalogoFecha($catalogoFecha)
    {
        $this->catalogoFecha = $catalogoFecha;
    
        return $this;
    }

    /**
     * Get catalogoFecha
     *
     * @return \DateTime
     */
    public function getCatalogoFecha()
    {
        return $this->catalogoFecha;
    }

    /**
     * Set catalogoDescuento
     *
     * @param integer $catalogoDescuento
     *
     * @return Catalogo
     */
    public function setCatalogoDescuento($catalogoDescuento)
    {
        $this->catalogoDescuento = $catalogoDescuento;
    
        return $this;
    }

    /**
     * Get catalogoDescuento
     *
     * @return integer
     */
    public function getCatalogoDescuento()
    {
        return $this->catalogoDescuento;
    }

    /**
     * Set catalogoPrecio
     *
     * @param string $catalogoPrecio
     *
     * @return Catalogo
     */
    public function setCatalogoPrecio($catalogoPrecio)
    {
        $this->catalogoPrecio = $catalogoPrecio;
    
        return $this;
    }

    /**
     * Get catalogoPrecio
     *
     * @return string
     */
    public function getCatalogoPrecio()
    {
        return $this->catalogoPrecio;
    }

    /**
     * Add catalogoCompraCompra
     *
     * @param \Compra $catalogoCompraCompra
     *
     * @return Catalogo
     */
    public function addCatalogoCompraCompra(\Compra $catalogoCompraCompra)
    {
        $this->catalogoCompraCompra[] = $catalogoCompraCompra;
    
        return $this;
    }

    /**
     * Remove catalogoCompraCompra
     *
     * @param \Compra $catalogoCompraCompra
     */
    public function removeCatalogoCompraCompra(\Compra $catalogoCompraCompra)
    {
        $this->catalogoCompraCompra->removeElement($catalogoCompraCompra);
    }

    /**
     * Get catalogoCompraCompra
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCatalogoCompraCompra()
    {
        return $this->catalogoCompraCompra;
    }

    /**
     * Add usuariocatNickname
     *
     * @param \Usuario $usuariocatNickname
     *
     * @return Catalogo
     */
    public function addUsuariocatNickname(\Usuario $usuariocatNickname)
    {
        $this->usuariocatNickname[] = $usuariocatNickname;
    
        return $this;
    }

    /**
     * Remove usuariocatNickname
     *
     * @param \Usuario $usuariocatNickname
     */
    public function removeUsuariocatNickname(\Usuario $usuariocatNickname)
    {
        $this->usuariocatNickname->removeElement($usuariocatNickname);
    }

    /**
     * Get usuariocatNickname
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsuariocatNickname()
    {
        return $this->usuariocatNickname;
    }
}

