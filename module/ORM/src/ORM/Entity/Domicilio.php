<?php

namespace ORM\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Domicilio
 *
 * @ORM\Table(name="domicilio", indexes={@ORM\Index(name="IDX_9B942ED1E7BD8AF6", columns={"domicilio_compra_id_compra"})})
 * @ORM\Entity
 */
class Domicilio
{
    /**
     * @var integer
     *
     * @ORM\Column(name="domicilio_id_domicilio", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="domicilio_domicilio_id_domicilio_seq", allocationSize=1, initialValue=1)
     */
    private $domicilioIdDomicilio;

    /**
     * @var boolean
     *
     * @ORM\Column(name="domicilio_estado", type="boolean", nullable=false)
     */
    private $domicilioEstado;

    /**
     * @var integer
     *
     * @ORM\Column(name="domicilio_costo_envio", type="integer", nullable=false)
     */
    private $domicilioCostoEnvio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="domicilio_fecha_entrega", type="date", nullable=false)
     */
    private $domicilioFechaEntrega;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="domicilio_fecha_salida", type="date", nullable=false)
     */
    private $domicilioFechaSalida;

    /**
     * @var \Compra
     *
     * @ORM\ManyToOne(targetEntity="Compra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="domicilio_compra_id_compra", referencedColumnName="compra_id_compra")
     * })
     */
    private $domicilioCompraCompra;


    /**
     * Get domicilioIdDomicilio
     *
     * @return integer
     */
    public function getDomicilioIdDomicilio()
    {
        return $this->domicilioIdDomicilio;
    }

    /**
     * Set domicilioEstado
     *
     * @param boolean $domicilioEstado
     *
     * @return Domicilio
     */
    public function setDomicilioEstado($domicilioEstado)
    {
        $this->domicilioEstado = $domicilioEstado;
    
        return $this;
    }

    /**
     * Get domicilioEstado
     *
     * @return boolean
     */
    public function getDomicilioEstado()
    {
        return $this->domicilioEstado;
    }

    /**
     * Set domicilioCostoEnvio
     *
     * @param integer $domicilioCostoEnvio
     *
     * @return Domicilio
     */
    public function setDomicilioCostoEnvio($domicilioCostoEnvio)
    {
        $this->domicilioCostoEnvio = $domicilioCostoEnvio;
    
        return $this;
    }

    /**
     * Get domicilioCostoEnvio
     *
     * @return integer
     */
    public function getDomicilioCostoEnvio()
    {
        return $this->domicilioCostoEnvio;
    }

    /**
     * Set domicilioFechaEntrega
     *
     * @param \DateTime $domicilioFechaEntrega
     *
     * @return Domicilio
     */
    public function setDomicilioFechaEntrega($domicilioFechaEntrega)
    {
        $this->domicilioFechaEntrega = $domicilioFechaEntrega;
    
        return $this;
    }

    /**
     * Get domicilioFechaEntrega
     *
     * @return \DateTime
     */
    public function getDomicilioFechaEntrega()
    {
        return $this->domicilioFechaEntrega;
    }

    /**
     * Set domicilioFechaSalida
     *
     * @param \DateTime $domicilioFechaSalida
     *
     * @return Domicilio
     */
    public function setDomicilioFechaSalida($domicilioFechaSalida)
    {
        $this->domicilioFechaSalida = $domicilioFechaSalida;
    
        return $this;
    }

    /**
     * Get domicilioFechaSalida
     *
     * @return \DateTime
     */
    public function getDomicilioFechaSalida()
    {
        return $this->domicilioFechaSalida;
    }

    /**
     * Set domicilioCompraCompra
     *
     * @param \Compra $domicilioCompraCompra
     *
     * @return Domicilio
     */
    public function setDomicilioCompraCompra(\Compra $domicilioCompraCompra = null)
    {
        $this->domicilioCompraCompra = $domicilioCompraCompra;
    
        return $this;
    }

    /**
     * Get domicilioCompraCompra
     *
     * @return \Compra
     */
    public function getDomicilioCompraCompra()
    {
        return $this->domicilioCompraCompra;
    }
}

