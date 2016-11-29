<?php

namespace ORM\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * DireccionDomicilio
 *
 * @ORM\Table(name="direccion_domicilio")
 * @ORM\Entity
 */
class DireccionDomicilio
{
    /**
     * @var string
     *
     * @ORM\Column(name="direccion_domicilio_ciudad", type="string", length=100, nullable=false)
     */
    private $direccionDomicilioCiudad;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion_domicilio_direccion", type="string", length=100, nullable=false)
     */
    private $direccionDomicilioDireccion;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion_domicilio_sector", type="string", length=100, nullable=false)
     */
    private $direccionDomicilioSector;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion_domicilio_barrio", type="string", length=100, nullable=false)
     */
    private $direccionDomicilioBarrio;

    /**
     * @var \Domicilio
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Domicilio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="direccion_domicilio_id_domicilio", referencedColumnName="domicilio_id_domicilio")
     * })
     */
    private $direccionDomicilioDomicilio;


    /**
     * Set direccionDomicilioCiudad
     *
     * @param string $direccionDomicilioCiudad
     *
     * @return DireccionDomicilio
     */
    public function setDireccionDomicilioCiudad($direccionDomicilioCiudad)
    {
        $this->direccionDomicilioCiudad = $direccionDomicilioCiudad;
    
        return $this;
    }

    /**
     * Get direccionDomicilioCiudad
     *
     * @return string
     */
    public function getDireccionDomicilioCiudad()
    {
        return $this->direccionDomicilioCiudad;
    }

    /**
     * Set direccionDomicilioDireccion
     *
     * @param string $direccionDomicilioDireccion
     *
     * @return DireccionDomicilio
     */
    public function setDireccionDomicilioDireccion($direccionDomicilioDireccion)
    {
        $this->direccionDomicilioDireccion = $direccionDomicilioDireccion;
    
        return $this;
    }

    /**
     * Get direccionDomicilioDireccion
     *
     * @return string
     */
    public function getDireccionDomicilioDireccion()
    {
        return $this->direccionDomicilioDireccion;
    }

    /**
     * Set direccionDomicilioSector
     *
     * @param string $direccionDomicilioSector
     *
     * @return DireccionDomicilio
     */
    public function setDireccionDomicilioSector($direccionDomicilioSector)
    {
        $this->direccionDomicilioSector = $direccionDomicilioSector;
    
        return $this;
    }

    /**
     * Get direccionDomicilioSector
     *
     * @return string
     */
    public function getDireccionDomicilioSector()
    {
        return $this->direccionDomicilioSector;
    }

    /**
     * Set direccionDomicilioBarrio
     *
     * @param string $direccionDomicilioBarrio
     *
     * @return DireccionDomicilio
     */
    public function setDireccionDomicilioBarrio($direccionDomicilioBarrio)
    {
        $this->direccionDomicilioBarrio = $direccionDomicilioBarrio;
    
        return $this;
    }

    /**
     * Get direccionDomicilioBarrio
     *
     * @return string
     */
    public function getDireccionDomicilioBarrio()
    {
        return $this->direccionDomicilioBarrio;
    }

    /**
     * Set direccionDomicilioDomicilio
     *
     * @param \Domicilio $direccionDomicilioDomicilio
     *
     * @return DireccionDomicilio
     */
    public function setDireccionDomicilioDomicilio(\Domicilio $direccionDomicilioDomicilio)
    {
        $this->direccionDomicilioDomicilio = $direccionDomicilioDomicilio;
    
        return $this;
    }

    /**
     * Get direccionDomicilioDomicilio
     *
     * @return \Domicilio
     */
    public function getDireccionDomicilioDomicilio()
    {
        return $this->direccionDomicilioDomicilio;
    }
}

