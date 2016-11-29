<?php

namespace ORM\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Administrador
 *
 * @ORM\Table(name="administrador", indexes={@ORM\Index(name="IDX_44F9A5214A05A79", columns={"administrador_id_cuenta"})})
 * @ORM\Entity
 */
class Administrador
{
    /**
     * @var integer
     *
     * @ORM\Column(name="administrador_id_admin", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="administrador_administrador_id_admin_seq", allocationSize=1, initialValue=1)
     */
    private $administradorIdAdmin;

    /**
     * @var \Cuenta
     *
     * @ORM\ManyToOne(targetEntity="Cuenta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="administrador_id_cuenta", referencedColumnName="cuenta_id_cuenta")
     * })
     */
    private $administradorCuenta;


    /**
     * Get administradorIdAdmin
     *
     * @return integer
     */
    public function getAdministradorIdAdmin()
    {
        return $this->administradorIdAdmin;
    }

    /**
     * Set administradorCuenta
     *
     * @param \Cuenta $administradorCuenta
     *
     * @return Administrador
     */
    public function setAdministradorCuenta(\Cuenta $administradorCuenta = null)
    {
        $this->administradorCuenta = $administradorCuenta;
    
        return $this;
    }

    /**
     * Get administradorCuenta
     *
     * @return \Cuenta
     */
    public function getAdministradorCuenta()
    {
        return $this->administradorCuenta;
    }
}

