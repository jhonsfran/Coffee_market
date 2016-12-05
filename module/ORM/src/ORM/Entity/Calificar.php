<?php


namespace ORM\Entity;



use Doctrine\ORM\Mapping as ORM;

/**
 * Calificar
 *
 * @ORM\Table(name="calificar", indexes={@ORM\Index(name="IDX_246B74029073B3C0", columns={"calificar_catalogo_id_catalogo"}), @ORM\Index(name="IDX_246B740277E102CE", columns={"calificar_usuario_nickname"})})
 * @ORM\Entity
 */
class Calificar
{
    /**
     * @var integer
     *
     * @ORM\Column(name="calificar_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="calificar_calificar_id_seq", allocationSize=1, initialValue=1)
     */
    private $calificarId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="calificar_fecha", type="date", nullable=false)
     */
    private $calificarFecha;

    /**
     * @var \Catalogo
     *
     * @ORM\ManyToOne(targetEntity="Catalogo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="calificar_catalogo_id_catalogo", referencedColumnName="catalogo_id_catalogo")
     * })
     */
    private $calificarCatalogoCatalogo;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="calificar_usuario_nickname", referencedColumnName="usuario_nickname")
     * })
     */
    private $calificarUsuarioNickname;


    /**
     * Get calificarId
     *
     * @return integer
     */
    public function getCalificarId()
    {
        return $this->calificarId;
    }

    /**
     * Set calificarFecha
     *
     * @param \DateTime $calificarFecha
     *
     * @return Calificar
     */
    public function setCalificarFecha($calificarFecha)
    {
        $this->calificarFecha = $calificarFecha;
    
        return $this;
    }

    /**
     * Get calificarFecha
     *
     * @return \DateTime
     */
    public function getCalificarFecha()
    {
        return $this->calificarFecha;
    }

    /**
     * Set calificarCatalogoCatalogo
     *
     * @param \Catalogo $calificarCatalogoCatalogo
     *
     * @return Calificar
     */
    public function setCalificarCatalogoCatalogo(\Catalogo $calificarCatalogoCatalogo = null)
    {
        $this->calificarCatalogoCatalogo = $calificarCatalogoCatalogo;
    
        return $this;
    }

    /**
     * Get calificarCatalogoCatalogo
     *
     * @return \Catalogo
     */
    public function getCalificarCatalogoCatalogo()
    {
        return $this->calificarCatalogoCatalogo;
    }

    /**
     * Set calificarUsuarioNickname
     *
     * @param \Usuario $calificarUsuarioNickname
     *
     * @return Calificar
     */
    public function setCalificarUsuarioNickname(\Usuario $calificarUsuarioNickname = null)
    {
        $this->calificarUsuarioNickname = $calificarUsuarioNickname;
    
        return $this;
    }

    /**
     * Get calificarUsuarioNickname
     *
     * @return \Usuario
     */
    public function getCalificarUsuarioNickname()
    {
        return $this->calificarUsuarioNickname;
    }
}

