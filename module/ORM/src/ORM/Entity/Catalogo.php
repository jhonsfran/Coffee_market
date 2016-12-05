<?php


namespace ORM\Entity;



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
     * @ORM\ManyToMany(targetEntity="Usuario", mappedBy="agregarDeseoCatalogoCatalogo")
     */
    private $agregarDeseoUser;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->agregarDeseoUser = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add agregarDeseoUser
     *
     * @param \Usuario $agregarDeseoUser
     *
     * @return Catalogo
     */
    public function addAgregarDeseoUser(\Usuario $agregarDeseoUser)
    {
        $this->agregarDeseoUser[] = $agregarDeseoUser;
    
        return $this;
    }

    /**
     * Remove agregarDeseoUser
     *
     * @param \Usuario $agregarDeseoUser
     */
    public function removeAgregarDeseoUser(\Usuario $agregarDeseoUser)
    {
        $this->agregarDeseoUser->removeElement($agregarDeseoUser);
    }

    /**
     * Get agregarDeseoUser
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAgregarDeseoUser()
    {
        return $this->agregarDeseoUser;
    }
}

