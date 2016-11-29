<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Tipo
 *
 * @ORM\Table(name="tipo")
 * @ORM\Entity
 */
class Tipo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="tipo_id_tipo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="tipo_tipo_id_tipo_seq", allocationSize=1, initialValue=1)
     */
    private $tipoIdTipo;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_nombre", type="string", length=100, nullable=false)
     */
    private $tipoNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_descripcion", type="string", length=100, nullable=false)
     */
    private $tipoDescripcion;


    /**
     * Get tipoIdTipo
     *
     * @return integer
     */
    public function getTipoIdTipo()
    {
        return $this->tipoIdTipo;
    }

    /**
     * Set tipoNombre
     *
     * @param string $tipoNombre
     *
     * @return Tipo
     */
    public function setTipoNombre($tipoNombre)
    {
        $this->tipoNombre = $tipoNombre;
    
        return $this;
    }

    /**
     * Get tipoNombre
     *
     * @return string
     */
    public function getTipoNombre()
    {
        return $this->tipoNombre;
    }

    /**
     * Set tipoDescripcion
     *
     * @param string $tipoDescripcion
     *
     * @return Tipo
     */
    public function setTipoDescripcion($tipoDescripcion)
    {
        $this->tipoDescripcion = $tipoDescripcion;
    
        return $this;
    }

    /**
     * Get tipoDescripcion
     *
     * @return string
     */
    public function getTipoDescripcion()
    {
        return $this->tipoDescripcion;
    }
}

