<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Variedad
 *
 * @ORM\Table(name="variedad")
 * @ORM\Entity
 */
class Variedad
{
    /**
     * @var integer
     *
     * @ORM\Column(name="variedad_id_variedad", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="variedad_variedad_id_variedad_seq", allocationSize=1, initialValue=1)
     */
    private $variedadIdVariedad;

    /**
     * @var string
     *
     * @ORM\Column(name="variedad_nombre", type="string", length=100, nullable=false)
     */
    private $variedadNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="variedad_descripcion", type="string", length=100, nullable=false)
     */
    private $variedadDescripcion;


    /**
     * Get variedadIdVariedad
     *
     * @return integer
     */
    public function getVariedadIdVariedad()
    {
        return $this->variedadIdVariedad;
    }

    /**
     * Set variedadNombre
     *
     * @param string $variedadNombre
     *
     * @return Variedad
     */
    public function setVariedadNombre($variedadNombre)
    {
        $this->variedadNombre = $variedadNombre;
    
        return $this;
    }

    /**
     * Get variedadNombre
     *
     * @return string
     */
    public function getVariedadNombre()
    {
        return $this->variedadNombre;
    }

    /**
     * Set variedadDescripcion
     *
     * @param string $variedadDescripcion
     *
     * @return Variedad
     */
    public function setVariedadDescripcion($variedadDescripcion)
    {
        $this->variedadDescripcion = $variedadDescripcion;
    
        return $this;
    }

    /**
     * Get variedadDescripcion
     *
     * @return string
     */
    public function getVariedadDescripcion()
    {
        return $this->variedadDescripcion;
    }
}

