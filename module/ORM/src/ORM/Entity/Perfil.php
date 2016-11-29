<?php

namespace ORM\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Perfil
 *
 * @ORM\Table(name="perfil")
 * @ORM\Entity
 */
class Perfil
{
    /**
     * @var integer
     *
     * @ORM\Column(name="perfil_id_perfil", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="perfil_perfil_id_perfil_seq", allocationSize=1, initialValue=1)
     */
    private $perfilIdPerfil;

    /**
     * @var string
     *
     * @ORM\Column(name="perfil_nombre", type="string", length=100, nullable=false)
     */
    private $perfilNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="perfil_descripcion", type="string", length=100, nullable=false)
     */
    private $perfilDescripcion;


    /**
     * Get perfilIdPerfil
     *
     * @return integer
     */
    public function getPerfilIdPerfil()
    {
        return $this->perfilIdPerfil;
    }

    /**
     * Set perfilNombre
     *
     * @param string $perfilNombre
     *
     * @return Perfil
     */
    public function setPerfilNombre($perfilNombre)
    {
        $this->perfilNombre = $perfilNombre;
    
        return $this;
    }

    /**
     * Get perfilNombre
     *
     * @return string
     */
    public function getPerfilNombre()
    {
        return $this->perfilNombre;
    }

    /**
     * Set perfilDescripcion
     *
     * @param string $perfilDescripcion
     *
     * @return Perfil
     */
    public function setPerfilDescripcion($perfilDescripcion)
    {
        $this->perfilDescripcion = $perfilDescripcion;
    
        return $this;
    }

    /**
     * Get perfilDescripcion
     *
     * @return string
     */
    public function getPerfilDescripcion()
    {
        return $this->perfilDescripcion;
    }
}

