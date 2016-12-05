<?php


namespace ORM\Entity;



use Doctrine\ORM\Mapping as ORM;

/**
 * Origen
 *
 * @ORM\Table(name="origen")
 * @ORM\Entity
 */
class Origen
{
    /**
     * @var integer
     *
     * @ORM\Column(name="tipo_id_origen", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="origen_tipo_id_origen_seq", allocationSize=1, initialValue=1)
     */
    private $tipoIdOrigen;

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
     * Get tipoIdOrigen
     *
     * @return integer
     */
    public function getTipoIdOrigen()
    {
        return $this->tipoIdOrigen;
    }

    /**
     * Set tipoNombre
     *
     * @param string $tipoNombre
     *
     * @return Origen
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
     * @return Origen
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

