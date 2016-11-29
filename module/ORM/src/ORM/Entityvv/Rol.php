<?php

namespace ORM\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rol
 *
 * @ORM\Table(name="rol")
 * @ORM\Entity
 */
class Rol
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rol_id_rol", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="rol_rol_id_rol_seq", allocationSize=1, initialValue=1)
     */
    private $rolIdRol;

    /**
     * @var string
     *
     * @ORM\Column(name="rol_descripcion", type="string", length=200, nullable=false)
     */
    private $rolDescripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="rol_fecha", type="date", nullable=false)
     */
    private $rolFecha;

    /**
     * @var string
     *
     * @ORM\Column(name="rol_nombre", type="string", length=100, nullable=false)
     */
    private $rolNombre;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Modulo", inversedBy="rolmoduRol")
     * @ORM\JoinTable(name="rol_modulo",
     *   joinColumns={
     *     @ORM\JoinColumn(name="rolmodu_id_rol", referencedColumnName="rol_id_rol")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="rolmodu_id_modulo", referencedColumnName="modulo_id_modulo")
     *   }
     * )
     */
    private $rolmoduModulo;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rolmoduModulo = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get rolIdRol
     *
     * @return integer
     */
    public function getRolIdRol()
    {
        return $this->rolIdRol;
    }

    /**
     * Set rolDescripcion
     *
     * @param string $rolDescripcion
     *
     * @return Rol
     */
    public function setRolDescripcion($rolDescripcion)
    {
        $this->rolDescripcion = $rolDescripcion;
    
        return $this;
    }

    /**
     * Get rolDescripcion
     *
     * @return string
     */
    public function getRolDescripcion()
    {
        return $this->rolDescripcion;
    }

    /**
     * Set rolFecha
     *
     * @param \DateTime $rolFecha
     *
     * @return Rol
     */
    public function setRolFecha($rolFecha)
    {
        $this->rolFecha = $rolFecha;
    
        return $this;
    }

    /**
     * Get rolFecha
     *
     * @return \DateTime
     */
    public function getRolFecha()
    {
        return $this->rolFecha;
    }

    /**
     * Set rolNombre
     *
     * @param string $rolNombre
     *
     * @return Rol
     */
    public function setRolNombre($rolNombre)
    {
        $this->rolNombre = $rolNombre;
    
        return $this;
    }

    /**
     * Get rolNombre
     *
     * @return string
     */
    public function getRolNombre()
    {
        return $this->rolNombre;
    }

    /**
     * Get rolmoduModulo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRolmoduModulo()
    {
        return $this->rolmoduModulo;
    }
}

