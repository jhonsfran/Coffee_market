<?php


namespace ORM\Entity;



use Doctrine\ORM\Mapping as ORM;

/**
 * Probadita
 *
 * @ORM\Table(name="probadita")
 * @ORM\Entity
 */
class Probadita
{
    /**
     * @var string
     *
     * @ORM\Column(name="probadita_precio", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $probaditaPrecio;

    /**
     * @var \Suscripcion
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Suscripcion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="probadita_suscripcion_id_suscripcion", referencedColumnName="suscripcion_id_suscripcion")
     * })
     */
    private $probaditaSuscripcionSuscripcion;


    /**
     * Set probaditaPrecio
     *
     * @param string $probaditaPrecio
     *
     * @return Probadita
     */
    public function setProbaditaPrecio($probaditaPrecio)
    {
        $this->probaditaPrecio = $probaditaPrecio;
    
        return $this;
    }

    /**
     * Get probaditaPrecio
     *
     * @return string
     */
    public function getProbaditaPrecio()
    {
        return $this->probaditaPrecio;
    }

    /**
     * Set probaditaSuscripcionSuscripcion
     *
     * @param \Suscripcion $probaditaSuscripcionSuscripcion
     *
     * @return Probadita
     */
    public function setProbaditaSuscripcionSuscripcion(\Suscripcion $probaditaSuscripcionSuscripcion)
    {
        $this->probaditaSuscripcionSuscripcion = $probaditaSuscripcionSuscripcion;
    
        return $this;
    }

    /**
     * Get probaditaSuscripcionSuscripcion
     *
     * @return \Suscripcion
     */
    public function getProbaditaSuscripcionSuscripcion()
    {
        return $this->probaditaSuscripcionSuscripcion;
    }
}

