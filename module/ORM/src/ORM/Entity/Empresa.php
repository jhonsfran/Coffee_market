<?php

namespace ORM\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Empresa
 *
 * @ORM\Table(name="empresa", indexes={@ORM\Index(name="IDX_B8D75A501B46985D", columns={"empresa_id_cuenta"})})
 * @ORM\Entity
 */
class Empresa
{
    /**
     * @var integer
     *
     * @ORM\Column(name="empresa_id_empresa", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="empresa_empresa_id_empresa_seq", allocationSize=1, initialValue=1)
     */
    private $empresaIdEmpresa;

    /**
     * @var string
     *
     * @ORM\Column(name="empresa_experiencia", type="string", length=100, nullable=false)
     */
    private $empresaExperiencia;

    /**
     * @var \Cuenta
     *
     * @ORM\ManyToOne(targetEntity="Cuenta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="empresa_id_cuenta", referencedColumnName="cuenta_id_cuenta")
     * })
     */
    private $empresaCuenta;


    /**
     * Get empresaIdEmpresa
     *
     * @return integer
     */
    public function getEmpresaIdEmpresa()
    {
        return $this->empresaIdEmpresa;
    }

    /**
     * Set empresaExperiencia
     *
     * @param string $empresaExperiencia
     *
     * @return Empresa
     */
    public function setEmpresaExperiencia($empresaExperiencia)
    {
        $this->empresaExperiencia = $empresaExperiencia;
    
        return $this;
    }

    /**
     * Get empresaExperiencia
     *
     * @return string
     */
    public function getEmpresaExperiencia()
    {
        return $this->empresaExperiencia;
    }

    /**
     * Set empresaCuenta
     *
     * @param \Cuenta $empresaCuenta
     *
     * @return Empresa
     */
    public function setEmpresaCuenta(\Cuenta $empresaCuenta = null)
    {
        $this->empresaCuenta = $empresaCuenta;
    
        return $this;
    }

    /**
     * Get empresaCuenta
     *
     * @return \Cuenta
     */
    public function getEmpresaCuenta()
    {
        return $this->empresaCuenta;
    }
}

