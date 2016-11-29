<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Finca
 *
 * @ORM\Table(name="finca")
 * @ORM\Entity
 */
class Finca
{
    /**
     * @var integer
     *
     * @ORM\Column(name="finca_id_finca", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="finca_finca_id_finca_seq", allocationSize=1, initialValue=1)
     */
    private $fincaIdFinca;

    /**
     * @var string
     *
     * @ORM\Column(name="finca_nombre", type="string", length=100, nullable=false)
     */
    private $fincaNombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="finca_descripcion", type="integer", nullable=false)
     */
    private $fincaDescripcion;


    /**
     * Get fincaIdFinca
     *
     * @return integer
     */
    public function getFincaIdFinca()
    {
        return $this->fincaIdFinca;
    }

    /**
     * Set fincaNombre
     *
     * @param string $fincaNombre
     *
     * @return Finca
     */
    public function setFincaNombre($fincaNombre)
    {
        $this->fincaNombre = $fincaNombre;
    
        return $this;
    }

    /**
     * Get fincaNombre
     *
     * @return string
     */
    public function getFincaNombre()
    {
        return $this->fincaNombre;
    }

    /**
     * Set fincaDescripcion
     *
     * @param integer $fincaDescripcion
     *
     * @return Finca
     */
    public function setFincaDescripcion($fincaDescripcion)
    {
        $this->fincaDescripcion = $fincaDescripcion;
    
        return $this;
    }

    /**
     * Get fincaDescripcion
     *
     * @return integer
     */
    public function getFincaDescripcion()
    {
        return $this->fincaDescripcion;
    }
}

