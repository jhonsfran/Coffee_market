<?php


namespace ORM\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoSuscripcion
 *
 * @ORM\Table(name="tipo_suscripcion")
 * @ORM\Entity(repositoryClass="ORM\Repository\SuscripcionRepository")
 */
class TipoSuscripcion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="tp_suscri_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="tipo_suscripcion_tp_suscri_id_seq", allocationSize=1, initialValue=1)
     */
    private $tpSuscriId;

    /**
     * @var string
     *
     * @ORM\Column(name="tp_suscri_nombre", type="string", length=50, nullable=false)
     */
    private $tpSuscriNombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tp_suscri_fecha", type="date", nullable=false)
     */
    private $tpSuscriFecha;


    /**
     * Get tpSuscriId
     *
     * @return integer
     */
    public function getTpSuscriId()
    {
        return $this->tpSuscriId;
    }

    /**
     * Set tpSuscriNombre
     *
     * @param string $tpSuscriNombre
     *
     * @return TipoSuscripcion
     */
    public function setTpSuscriNombre($tpSuscriNombre)
    {
        $this->tpSuscriNombre = $tpSuscriNombre;
    
        return $this;
    }

    /**
     * Get tpSuscriNombre
     *
     * @return string
     */
    public function getTpSuscriNombre()
    {
        return $this->tpSuscriNombre;
    }

    /**
     * Set tpSuscriFecha
     *
     * @param \DateTime $tpSuscriFecha
     *
     * @return TipoSuscripcion
     */
    public function setTpSuscriFecha($tpSuscriFecha)
    {
        $this->tpSuscriFecha = $tpSuscriFecha;
    
        return $this;
    }

    /**
     * Get tpSuscriFecha
     *
     * @return \DateTime
     */
    public function getTpSuscriFecha()
    {
        return $this->tpSuscriFecha;
    }
}

