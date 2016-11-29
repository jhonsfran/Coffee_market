<?php

namespace ORM\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RolUsuario
 *
 * @ORM\Table(name="rol_usuario", indexes={@ORM\Index(name="IDX_647DF9DA9ECBE030", columns={"usuario_id_cuenta"}), @ORM\Index(name="IDX_647DF9DA4A934F09", columns={"nivel_usuario_usuario_id_nivel"})})
 * @ORM\Entity
 */
class RolUsuario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="usuario_id_usuario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="rol_usuario_usuario_id_usuario_seq", allocationSize=1, initialValue=1)
     */
    private $usuarioIdUsuario;

    /**
     * @var \Cuenta
     *
     * @ORM\ManyToOne(targetEntity="Cuenta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_id_cuenta", referencedColumnName="cuenta_id_cuenta")
     * })
     */
    private $usuarioCuenta;

    /**
     * @var \NivelUsuario
     *
     * @ORM\ManyToOne(targetEntity="NivelUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nivel_usuario_usuario_id_nivel", referencedColumnName="nivel_usuario_id_nivel")
     * })
     */
    private $nivelUsuarioUsuarioNivel;


    /**
     * Get usuarioIdUsuario
     *
     * @return integer
     */
    public function getUsuarioIdUsuario()
    {
        return $this->usuarioIdUsuario;
    }

    /**
     * Set usuarioCuenta
     *
     * @param \Cuenta $usuarioCuenta
     *
     * @return RolUsuario
     */
    public function setUsuarioCuenta(\Cuenta $usuarioCuenta = null)
    {
        $this->usuarioCuenta = $usuarioCuenta;
    
        return $this;
    }

    /**
     * Get usuarioCuenta
     *
     * @return \Cuenta
     */
    public function getUsuarioCuenta()
    {
        return $this->usuarioCuenta;
    }

    /**
     * Set nivelUsuarioUsuarioNivel
     *
     * @param \NivelUsuario $nivelUsuarioUsuarioNivel
     *
     * @return RolUsuario
     */
    public function setNivelUsuarioUsuarioNivel(\NivelUsuario $nivelUsuarioUsuarioNivel = null)
    {
        $this->nivelUsuarioUsuarioNivel = $nivelUsuarioUsuarioNivel;
    
        return $this;
    }

    /**
     * Get nivelUsuarioUsuarioNivel
     *
     * @return \NivelUsuario
     */
    public function getNivelUsuarioUsuarioNivel()
    {
        return $this->nivelUsuarioUsuarioNivel;
    }
}

