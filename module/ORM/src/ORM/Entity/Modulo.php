<?php


namespace ORM\Entity;



use Doctrine\ORM\Mapping as ORM;

/**
 * Modulo
 *
 * @ORM\Table(name="modulo")
 * @ORM\Entity
 */
class Modulo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="modulo_id_modulo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="modulo_modulo_id_modulo_seq", allocationSize=1, initialValue=1)
     */
    private $moduloIdModulo;

    /**
     * @var string
     *
     * @ORM\Column(name="modulo_nombre", type="string", length=100, nullable=false)
     */
    private $moduloNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="modulo_url", type="string", length=250, nullable=false)
     */
    private $moduloUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="modulo_imagen", type="string", length=200, nullable=false)
     */
    private $moduloImagen;

    /**
     * @var string
     *
     * @ORM\Column(name="modulo_descripcion", type="string", length=250, nullable=false)
     */
    private $moduloDescripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modulo_fecha_ingreso", type="date", nullable=false)
     */
    private $moduloFechaIngreso;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ObjetosModulo", inversedBy="moduloObjetosModModulo")
     * @ORM\JoinTable(name="modulo_objetos_mod",
     *   joinColumns={
     *     @ORM\JoinColumn(name="modulo_objetos_mod_id_modulo", referencedColumnName="modulo_id_modulo")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="modulo_objetos_mod_id_objeto", referencedColumnName="objetos_modulo_id_objeto")
     *   }
     * )
     */
    private $moduloObjetosModObjeto;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Rol", mappedBy="rolmoduModulo")
     */
    private $rolmoduRol;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->moduloObjetosModObjeto = new \Doctrine\Common\Collections\ArrayCollection();
        $this->rolmoduRol = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get moduloIdModulo
     *
     * @return integer
     */
    public function getModuloIdModulo()
    {
        return $this->moduloIdModulo;
    }

    /**
     * Set moduloNombre
     *
     * @param string $moduloNombre
     *
     * @return Modulo
     */
    public function setModuloNombre($moduloNombre)
    {
        $this->moduloNombre = $moduloNombre;
    
        return $this;
    }

    /**
     * Get moduloNombre
     *
     * @return string
     */
    public function getModuloNombre()
    {
        return $this->moduloNombre;
    }

    /**
     * Set moduloUrl
     *
     * @param string $moduloUrl
     *
     * @return Modulo
     */
    public function setModuloUrl($moduloUrl)
    {
        $this->moduloUrl = $moduloUrl;
    
        return $this;
    }

    /**
     * Get moduloUrl
     *
     * @return string
     */
    public function getModuloUrl()
    {
        return $this->moduloUrl;
    }

    /**
     * Set moduloImagen
     *
     * @param string $moduloImagen
     *
     * @return Modulo
     */
    public function setModuloImagen($moduloImagen)
    {
        $this->moduloImagen = $moduloImagen;
    
        return $this;
    }

    /**
     * Get moduloImagen
     *
     * @return string
     */
    public function getModuloImagen()
    {
        return $this->moduloImagen;
    }

    /**
     * Set moduloDescripcion
     *
     * @param string $moduloDescripcion
     *
     * @return Modulo
     */
    public function setModuloDescripcion($moduloDescripcion)
    {
        $this->moduloDescripcion = $moduloDescripcion;
    
        return $this;
    }

    /**
     * Get moduloDescripcion
     *
     * @return string
     */
    public function getModuloDescripcion()
    {
        return $this->moduloDescripcion;
    }

    /**
     * Set moduloFechaIngreso
     *
     * @param \DateTime $moduloFechaIngreso
     *
     * @return Modulo
     */
    public function setModuloFechaIngreso($moduloFechaIngreso)
    {
        $this->moduloFechaIngreso = $moduloFechaIngreso;
    
        return $this;
    }

    /**
     * Get moduloFechaIngreso
     *
     * @return \DateTime
     */
    public function getModuloFechaIngreso()
    {
        return $this->moduloFechaIngreso;
    }

    /**
     * Add moduloObjetosModObjeto
     *
     * @param \ObjetosModulo $moduloObjetosModObjeto
     *
     * @return Modulo
     */
    public function addModuloObjetosModObjeto(\ObjetosModulo $moduloObjetosModObjeto)
    {
        $this->moduloObjetosModObjeto[] = $moduloObjetosModObjeto;
    
        return $this;
    }

    /**
     * Remove moduloObjetosModObjeto
     *
     * @param \ObjetosModulo $moduloObjetosModObjeto
     */
    public function removeModuloObjetosModObjeto(\ObjetosModulo $moduloObjetosModObjeto)
    {
        $this->moduloObjetosModObjeto->removeElement($moduloObjetosModObjeto);
    }

    /**
     * Get moduloObjetosModObjeto
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getModuloObjetosModObjeto()
    {
        return $this->moduloObjetosModObjeto;
    }

    /**
     * Add rolmoduRol
     *
     * @param \Rol $rolmoduRol
     *
     * @return Modulo
     */
    public function addRolmoduRol(\Rol $rolmoduRol)
    {
        $this->rolmoduRol[] = $rolmoduRol;
    
        return $this;
    }

    /**
     * Remove rolmoduRol
     *
     * @param \Rol $rolmoduRol
     */
    public function removeRolmoduRol(\Rol $rolmoduRol)
    {
        $this->rolmoduRol->removeElement($rolmoduRol);
    }

    /**
     * Get rolmoduRol
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRolmoduRol()
    {
        return $this->rolmoduRol;
    }
}

