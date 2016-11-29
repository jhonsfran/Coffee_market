<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Preferencias
 *
 * @ORM\Table(name="preferencias")
 * @ORM\Entity
 */
class Preferencias
{
    /**
     * @var integer
     *
     * @ORM\Column(name="preferencia_id_preferencia", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="preferencias_preferencia_id_preferencia_seq", allocationSize=1, initialValue=1)
     */
    private $preferenciaIdPreferencia;

    /**
     * @var string
     *
     * @ORM\Column(name="preferencia_nombre", type="string", length=100, nullable=false)
     */
    private $preferenciaNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="preferencia_descripcion", type="string", length=250, nullable=false)
     */
    private $preferenciaDescripcion;


    /**
     * Get preferenciaIdPreferencia
     *
     * @return integer
     */
    public function getPreferenciaIdPreferencia()
    {
        return $this->preferenciaIdPreferencia;
    }

    /**
     * Set preferenciaNombre
     *
     * @param string $preferenciaNombre
     *
     * @return Preferencias
     */
    public function setPreferenciaNombre($preferenciaNombre)
    {
        $this->preferenciaNombre = $preferenciaNombre;
    
        return $this;
    }

    /**
     * Get preferenciaNombre
     *
     * @return string
     */
    public function getPreferenciaNombre()
    {
        return $this->preferenciaNombre;
    }

    /**
     * Set preferenciaDescripcion
     *
     * @param string $preferenciaDescripcion
     *
     * @return Preferencias
     */
    public function setPreferenciaDescripcion($preferenciaDescripcion)
    {
        $this->preferenciaDescripcion = $preferenciaDescripcion;
    
        return $this;
    }

    /**
     * Get preferenciaDescripcion
     *
     * @return string
     */
    public function getPreferenciaDescripcion()
    {
        return $this->preferenciaDescripcion;
    }
}

