<?php


namespace ORM\Entity;



use Doctrine\ORM\Mapping as ORM;

/**
 * Empresarial
 *
 * @ORM\Table(name="empresarial")
 * @ORM\Entity
 */
class Empresarial
{
    /**
     * @var string
     *
     * @ORM\Column(name="empresarial_periodicidad", type="string", length=100, nullable=false)
     */
    private $empresarialPeriodicidad;

    /**
     * @var string
     *
     * @ORM\Column(name="empresarial_precio", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $empresarialPrecio;

    /**
     * @var integer
     *
     * @ORM\Column(name="empresarial_cantidad", type="integer", nullable=false)
     */
    private $empresarialCantidad;

    /**
     * @var \Suscripcion
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Suscripcion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="suscripcion_suscripcion_id_suscripcion", referencedColumnName="suscripcion_id_suscripcion")
     * })
     */
    private $suscripcionSuscripcionSuscripcion;


    /**
     * Set empresarialPeriodicidad
     *
     * @param string $empresarialPeriodicidad
     *
     * @return Empresarial
     */
    public function setEmpresarialPeriodicidad($empresarialPeriodicidad)
    {
        $this->empresarialPeriodicidad = $empresarialPeriodicidad;
    
        return $this;
    }

    /**
     * Get empresarialPeriodicidad
     *
     * @return string
     */
    public function getEmpresarialPeriodicidad()
    {
        return $this->empresarialPeriodicidad;
    }

    /**
     * Set empresarialPrecio
     *
     * @param string $empresarialPrecio
     *
     * @return Empresarial
     */
    public function setEmpresarialPrecio($empresarialPrecio)
    {
        $this->empresarialPrecio = $empresarialPrecio;
    
        return $this;
    }

    /**
     * Get empresarialPrecio
     *
     * @return string
     */
    public function getEmpresarialPrecio()
    {
        return $this->empresarialPrecio;
    }

    /**
     * Set empresarialCantidad
     *
     * @param integer $empresarialCantidad
     *
     * @return Empresarial
     */
    public function setEmpresarialCantidad($empresarialCantidad)
    {
        $this->empresarialCantidad = $empresarialCantidad;
    
        return $this;
    }

    /**
     * Get empresarialCantidad
     *
     * @return integer
     */
    public function getEmpresarialCantidad()
    {
        return $this->empresarialCantidad;
    }

    /**
     * Set suscripcionSuscripcionSuscripcion
     *
     * @param \Suscripcion $suscripcionSuscripcionSuscripcion
     *
     * @return Empresarial
     */
    public function setSuscripcionSuscripcionSuscripcion(\Suscripcion $suscripcionSuscripcionSuscripcion)
    {
        $this->suscripcionSuscripcionSuscripcion = $suscripcionSuscripcionSuscripcion;
    
        return $this;
    }

    /**
     * Get suscripcionSuscripcionSuscripcion
     *
     * @return \Suscripcion
     */
    public function getSuscripcionSuscripcionSuscripcion()
    {
        return $this->suscripcionSuscripcionSuscripcion;
    }
}

