<?php


namespace ORM\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comentar
 *
 * @ORM\Table(name="comentar", indexes={@ORM\Index(name="IDX_E9ECAACE11A38051", columns={"comentar_usuario_nickname"})})
 * @ORM\Entity
 */
class Comentar
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="comentar_fecha", type="date", nullable=false)
     */
    private $comentarFecha;

    /**
     * @var \CompartirCompra
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="CompartirCompra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="comentar_compartir_id_compartir", referencedColumnName="compartir_compra_id_compartir")
     * })
     */
    private $comentarCompartirCompartir;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="comentar_usuario_nickname", referencedColumnName="usuario_nickname")
     * })
     */
    private $comentarUsuarioNickname;


    /**
     * Set comentarFecha
     *
     * @param \DateTime $comentarFecha
     *
     * @return Comentar
     */
    public function setComentarFecha($comentarFecha)
    {
        $this->comentarFecha = $comentarFecha;
    
        return $this;
    }

    /**
     * Get comentarFecha
     *
     * @return \DateTime
     */
    public function getComentarFecha()
    {
        return $this->comentarFecha;
    }

    /**
     * Set comentarCompartirCompartir
     *
     * @param \CompartirCompra $comentarCompartirCompartir
     *
     * @return Comentar
     */
    public function setComentarCompartirCompartir(\CompartirCompra $comentarCompartirCompartir)
    {
        $this->comentarCompartirCompartir = $comentarCompartirCompartir;
    
        return $this;
    }

    /**
     * Get comentarCompartirCompartir
     *
     * @return \CompartirCompra
     */
    public function getComentarCompartirCompartir()
    {
        return $this->comentarCompartirCompartir;
    }

    /**
     * Set comentarUsuarioNickname
     *
     * @param \Usuario $comentarUsuarioNickname
     *
     * @return Comentar
     */
    public function setComentarUsuarioNickname(\Usuario $comentarUsuarioNickname = null)
    {
        $this->comentarUsuarioNickname = $comentarUsuarioNickname;
    
        return $this;
    }

    /**
     * Get comentarUsuarioNickname
     *
     * @return \Usuario
     */
    public function getComentarUsuarioNickname()
    {
        return $this->comentarUsuarioNickname;
    }
}

