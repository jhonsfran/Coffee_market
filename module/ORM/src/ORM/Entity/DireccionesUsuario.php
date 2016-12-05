<?php


namespace ORM\Entity;



use Doctrine\ORM\Mapping as ORM;

/**
 * DireccionesUsuario
 *
 * @ORM\Table(name="direcciones_usuario", indexes={@ORM\Index(name="IDX_BA625DD525E9710", columns={"dirusuario_nickname"})})
 * @ORM\Entity
 */
class DireccionesUsuario
{
    /**
     * @var string
     *
     * @ORM\Column(name="dir_direccion", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $dirDireccion;

    /**
     * @var \Usuario
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dirusuario_nickname", referencedColumnName="usuario_nickname")
     * })
     */
    private $dirusuarioNickname;


    /**
     * Set dirDireccion
     *
     * @param string $dirDireccion
     *
     * @return DireccionesUsuario
     */
    public function setDirDireccion($dirDireccion)
    {
        $this->dirDireccion = $dirDireccion;
    
        return $this;
    }

    /**
     * Get dirDireccion
     *
     * @return string
     */
    public function getDirDireccion()
    {
        return $this->dirDireccion;
    }

    /**
     * Set dirusuarioNickname
     *
     * @param \Usuario $dirusuarioNickname
     *
     * @return DireccionesUsuario
     */
    public function setDirusuarioNickname(\Usuario $dirusuarioNickname)
    {
        $this->dirusuarioNickname = $dirusuarioNickname;
    
        return $this;
    }

    /**
     * Get dirusuarioNickname
     *
     * @return \Usuario
     */
    public function getDirusuarioNickname()
    {
        return $this->dirusuarioNickname;
    }
}

