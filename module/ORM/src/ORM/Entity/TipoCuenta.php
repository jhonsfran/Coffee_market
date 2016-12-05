<?php

namespace ORM\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoCuenta
 *
 * @ORM\Table(name="tipo_cuenta")
 * @ORM\Entity(repositoryClass="ORM\Repository\CuentaRepository")
 */
class TipoCuenta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="tipo_cuenta_id_tipo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="tipo_cuenta_tipo_cuenta_id_tipo_seq", allocationSize=1, initialValue=1)
     */
    private $tipoCuentaIdTipo;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_cuenta_nombre", type="string", length=150, nullable=false)
     */
    private $tipoCuentaNombre;


    /**
     * Get tipoCuentaIdTipo
     *
     * @return integer
     */
    public function getTipoCuentaIdTipo()
    {
        return $this->tipoCuentaIdTipo;
    }

    /**
     * Set tipoCuentaNombre
     *
     * @param string $tipoCuentaNombre
     *
     * @return TipoCuenta
     */
    public function setTipoCuentaNombre($tipoCuentaNombre)
    {
        $this->tipoCuentaNombre = $tipoCuentaNombre;
    
        return $this;
    }

    /**
     * Get tipoCuentaNombre
     *
     * @return string
     */
    public function getTipoCuentaNombre()
    {
        return $this->tipoCuentaNombre;
    }
}

