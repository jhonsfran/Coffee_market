<?php


namespace ORM\Entity;



use Doctrine\ORM\Mapping as ORM;

/**
 * Comentario
 *
 * @ORM\Table(name="comentario", indexes={@ORM\Index(name="IDX_4B91E7023A931B29", columns={"comentario_catalogo_id_catalogo"}), @ORM\Index(name="IDX_4B91E702116E0988", columns={"comentario_usuario_nickname"})})
 * @ORM\Entity
 */
class Comentario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="comentario_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="comentario_comentario_id_seq", allocationSize=1, initialValue=1)
     */
    private $comentarioId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="comentario_fecha", type="date", nullable=false)
     */
    private $comentarioFecha;

    /**
     * @var \Catalogo
     *
     * @ORM\ManyToOne(targetEntity="Catalogo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="comentario_catalogo_id_catalogo", referencedColumnName="catalogo_id_catalogo")
     * })
     */
    private $comentarioCatalogoCatalogo;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="comentario_usuario_nickname", referencedColumnName="usuario_nickname")
     * })
     */
    private $comentarioUsuarioNickname;


    /**
     * Get comentarioId
     *
     * @return integer
     */
    public function getComentarioId()
    {
        return $this->comentarioId;
    }

    /**
     * Set comentarioFecha
     *
     * @param \DateTime $comentarioFecha
     *
     * @return Comentario
     */
    public function setComentarioFecha($comentarioFecha)
    {
        $this->comentarioFecha = $comentarioFecha;
    
        return $this;
    }

    /**
     * Get comentarioFecha
     *
     * @return \DateTime
     */
    public function getComentarioFecha()
    {
        return $this->comentarioFecha;
    }

    /**
     * Set comentarioCatalogoCatalogo
     *
     * @param \Catalogo $comentarioCatalogoCatalogo
     *
     * @return Comentario
     */
    public function setComentarioCatalogoCatalogo(\Catalogo $comentarioCatalogoCatalogo = null)
    {
        $this->comentarioCatalogoCatalogo = $comentarioCatalogoCatalogo;
    
        return $this;
    }

    /**
     * Get comentarioCatalogoCatalogo
     *
     * @return \Catalogo
     */
    public function getComentarioCatalogoCatalogo()
    {
        return $this->comentarioCatalogoCatalogo;
    }

    /**
     * Set comentarioUsuarioNickname
     *
     * @param \Usuario $comentarioUsuarioNickname
     *
     * @return Comentario
     */
    public function setComentarioUsuarioNickname(\Usuario $comentarioUsuarioNickname = null)
    {
        $this->comentarioUsuarioNickname = $comentarioUsuarioNickname;
    
        return $this;
    }

    /**
     * Get comentarioUsuarioNickname
     *
     * @return \Usuario
     */
    public function getComentarioUsuarioNickname()
    {
        return $this->comentarioUsuarioNickname;
    }
}

