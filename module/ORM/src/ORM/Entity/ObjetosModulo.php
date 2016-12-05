<?php


namespace ORM\Entity;



use Doctrine\ORM\Mapping as ORM;

/**
 * ObjetosModulo
 *
 * @ORM\Table(name="objetos_modulo")
 * @ORM\Entity
 */
class ObjetosModulo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="objetos_modulo_id_objeto", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="objetos_modulo_objetos_modulo_id_objeto_seq", allocationSize=1, initialValue=1)
     */
    private $objetosModuloIdObjeto;

    /**
     * @var string
     *
     * @ORM\Column(name="objetos_modulo_nombre", type="string", length=250, nullable=false)
     */
    private $objetosModuloNombre;

    /**
     * @var boolean
     *
     * @ORM\Column(name="objetos_modulo_accion", type="boolean", nullable=false)
     */
    private $objetosModuloAccion;

    /**
     * @var string
     *
     * @ORM\Column(name="objetos_modulo_imagen", type="string", length=250, nullable=false)
     */
    private $objetosModuloImagen;

    /**
     * @var string
     *
     * @ORM\Column(name="objetos_modulo_descripcion", type="string", length=250, nullable=false)
     */
    private $objetosModuloDescripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="objetos_modulo_fecha_ingreso", type="date", nullable=false)
     */
    private $objetosModuloFechaIngreso;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Modulo", mappedBy="moduloObjetosModObjeto")
     */
    private $moduloObjetosModModulo;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->moduloObjetosModModulo = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get objetosModuloIdObjeto
     *
     * @return integer
     */
    public function getObjetosModuloIdObjeto()
    {
        return $this->objetosModuloIdObjeto;
    }

    /**
     * Set objetosModuloNombre
     *
     * @param string $objetosModuloNombre
     *
     * @return ObjetosModulo
     */
    public function setObjetosModuloNombre($objetosModuloNombre)
    {
        $this->objetosModuloNombre = $objetosModuloNombre;
    
        return $this;
    }

    /**
     * Get objetosModuloNombre
     *
     * @return string
     */
    public function getObjetosModuloNombre()
    {
        return $this->objetosModuloNombre;
    }

    /**
     * Set objetosModuloAccion
     *
     * @param boolean $objetosModuloAccion
     *
     * @return ObjetosModulo
     */
    public function setObjetosModuloAccion($objetosModuloAccion)
    {
        $this->objetosModuloAccion = $objetosModuloAccion;
    
        return $this;
    }

    /**
     * Get objetosModuloAccion
     *
     * @return boolean
     */
    public function getObjetosModuloAccion()
    {
        return $this->objetosModuloAccion;
    }

    /**
     * Set objetosModuloImagen
     *
     * @param string $objetosModuloImagen
     *
     * @return ObjetosModulo
     */
    public function setObjetosModuloImagen($objetosModuloImagen)
    {
        $this->objetosModuloImagen = $objetosModuloImagen;
    
        return $this;
    }

    /**
     * Get objetosModuloImagen
     *
     * @return string
     */
    public function getObjetosModuloImagen()
    {
        return $this->objetosModuloImagen;
    }

    /**
     * Set objetosModuloDescripcion
     *
     * @param string $objetosModuloDescripcion
     *
     * @return ObjetosModulo
     */
    public function setObjetosModuloDescripcion($objetosModuloDescripcion)
    {
        $this->objetosModuloDescripcion = $objetosModuloDescripcion;
    
        return $this;
    }

    /**
     * Get objetosModuloDescripcion
     *
     * @return string
     */
    public function getObjetosModuloDescripcion()
    {
        return $this->objetosModuloDescripcion;
    }

    /**
     * Set objetosModuloFechaIngreso
     *
     * @param \DateTime $objetosModuloFechaIngreso
     *
     * @return ObjetosModulo
     */
    public function setObjetosModuloFechaIngreso($objetosModuloFechaIngreso)
    {
        $this->objetosModuloFechaIngreso = $objetosModuloFechaIngreso;
    
        return $this;
    }

    /**
     * Get objetosModuloFechaIngreso
     *
     * @return \DateTime
     */
    public function getObjetosModuloFechaIngreso()
    {
        return $this->objetosModuloFechaIngreso;
    }

    /**
     * Add moduloObjetosModModulo
     *
     * @param \Modulo $moduloObjetosModModulo
     *
     * @return ObjetosModulo
     */
    public function addModuloObjetosModModulo(\Modulo $moduloObjetosModModulo)
    {
        $this->moduloObjetosModModulo[] = $moduloObjetosModModulo;
    
        return $this;
    }

    /**
     * Remove moduloObjetosModModulo
     *
     * @param \Modulo $moduloObjetosModModulo
     */
    public function removeModuloObjetosModModulo(\Modulo $moduloObjetosModModulo)
    {
        $this->moduloObjetosModModulo->removeElement($moduloObjetosModModulo);
    }

    /**
     * Get moduloObjetosModModulo
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getModuloObjetosModModulo()
    {
        return $this->moduloObjetosModModulo;
    }
}

