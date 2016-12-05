<?php


namespace ORM\Entity;



use Doctrine\ORM\Mapping as ORM;

/**
 * CompartirComentarios
 *
 * @ORM\Table(name="compartir_comentarios")
 * @ORM\Entity
 */
class CompartirComentarios
{
    /**
     * @var string
     *
     * @ORM\Column(name="compartir_comentarios_usuario_nickname", type="string", length=50, nullable=false)
     */
    private $compartirComentariosUsuarioNickname;

    /**
     * @var string
     *
     * @ORM\Column(name="compartir_comentarios_comentario", type="string", length=255, nullable=false)
     */
    private $compartirComentariosComentario;

    /**
     * @var \Compartir
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Compartir")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="compartir_comentarios_id", referencedColumnName="compartir_id")
     * })
     */
    private $compartirComentarios;


    /**
     * Set compartirComentariosUsuarioNickname
     *
     * @param string $compartirComentariosUsuarioNickname
     *
     * @return CompartirComentarios
     */
    public function setCompartirComentariosUsuarioNickname($compartirComentariosUsuarioNickname)
    {
        $this->compartirComentariosUsuarioNickname = $compartirComentariosUsuarioNickname;
    
        return $this;
    }

    /**
     * Get compartirComentariosUsuarioNickname
     *
     * @return string
     */
    public function getCompartirComentariosUsuarioNickname()
    {
        return $this->compartirComentariosUsuarioNickname;
    }

    /**
     * Set compartirComentariosComentario
     *
     * @param string $compartirComentariosComentario
     *
     * @return CompartirComentarios
     */
    public function setCompartirComentariosComentario($compartirComentariosComentario)
    {
        $this->compartirComentariosComentario = $compartirComentariosComentario;
    
        return $this;
    }

    /**
     * Get compartirComentariosComentario
     *
     * @return string
     */
    public function getCompartirComentariosComentario()
    {
        return $this->compartirComentariosComentario;
    }

    /**
     * Set compartirComentarios
     *
     * @param \Compartir $compartirComentarios
     *
     * @return CompartirComentarios
     */
    public function setCompartirComentarios(\Compartir $compartirComentarios)
    {
        $this->compartirComentarios = $compartirComentarios;
    
        return $this;
    }

    /**
     * Get compartirComentarios
     *
     * @return \Compartir
     */
    public function getCompartirComentarios()
    {
        return $this->compartirComentarios;
    }
}

