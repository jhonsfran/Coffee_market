<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * NivelUsuario
 *
 * @ORM\Table(name="nivel_usuario")
 * @ORM\Entity
 */
class NivelUsuario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nivel_usuario_id_nivel", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="nivel_usuario_nivel_usuario_id_nivel_seq", allocationSize=1, initialValue=1)
     */
    private $nivelUsuarioIdNivel;

    /**
     * @var string
     *
     * @ORM\Column(name="nivel_usuario_tipo", type="string", length=100, nullable=false)
     */
    private $nivelUsuarioTipo;


    /**
     * Get nivelUsuarioIdNivel
     *
     * @return integer
     */
    public function getNivelUsuarioIdNivel()
    {
        return $this->nivelUsuarioIdNivel;
    }

    /**
     * Set nivelUsuarioTipo
     *
     * @param string $nivelUsuarioTipo
     *
     * @return NivelUsuario
     */
    public function setNivelUsuarioTipo($nivelUsuarioTipo)
    {
        $this->nivelUsuarioTipo = $nivelUsuarioTipo;
    
        return $this;
    }

    /**
     * Get nivelUsuarioTipo
     *
     * @return string
     */
    public function getNivelUsuarioTipo()
    {
        return $this->nivelUsuarioTipo;
    }
}

