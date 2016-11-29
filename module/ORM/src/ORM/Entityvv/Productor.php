<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Productor
 *
 * @ORM\Table(name="productor")
 * @ORM\Entity
 */
class Productor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="productor_id_productor", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="productor_productor_id_productor_seq", allocationSize=1, initialValue=1)
     */
    private $productorIdProductor;

    /**
     * @var string
     *
     * @ORM\Column(name="productor_nombre", type="string", length=100, nullable=false)
     */
    private $productorNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="productor_descripcion", type="string", length=100, nullable=false)
     */
    private $productorDescripcion;


    /**
     * Get productorIdProductor
     *
     * @return integer
     */
    public function getProductorIdProductor()
    {
        return $this->productorIdProductor;
    }

    /**
     * Set productorNombre
     *
     * @param string $productorNombre
     *
     * @return Productor
     */
    public function setProductorNombre($productorNombre)
    {
        $this->productorNombre = $productorNombre;
    
        return $this;
    }

    /**
     * Get productorNombre
     *
     * @return string
     */
    public function getProductorNombre()
    {
        return $this->productorNombre;
    }

    /**
     * Set productorDescripcion
     *
     * @param string $productorDescripcion
     *
     * @return Productor
     */
    public function setProductorDescripcion($productorDescripcion)
    {
        $this->productorDescripcion = $productorDescripcion;
    
        return $this;
    }

    /**
     * Get productorDescripcion
     *
     * @return string
     */
    public function getProductorDescripcion()
    {
        return $this->productorDescripcion;
    }
}

