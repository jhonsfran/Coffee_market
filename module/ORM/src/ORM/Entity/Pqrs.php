<?php

namespace ORM\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Pqrs
 *
 * @ORM\Table(name="pqrs")
 * @ORM\Entity
 */
class Pqrs
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pqrs_id_pgrs", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="pqrs_pqrs_id_pgrs_seq", allocationSize=1, initialValue=1)
     */
    private $pqrsIdPgrs;

    /**
     * @var string
     *
     * @ORM\Column(name="pqrs_descripcion", type="string", length=200, nullable=false)
     */
    private $pqrsDescripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pqrs_fecha", type="date", nullable=false)
     */
    private $pqrsFecha;


    /**
     * Get pqrsIdPgrs
     *
     * @return integer
     */
    public function getPqrsIdPgrs()
    {
        return $this->pqrsIdPgrs;
    }

    /**
     * Set pqrsDescripcion
     *
     * @param string $pqrsDescripcion
     *
     * @return Pqrs
     */
    public function setPqrsDescripcion($pqrsDescripcion)
    {
        $this->pqrsDescripcion = $pqrsDescripcion;
    
        return $this;
    }

    /**
     * Get pqrsDescripcion
     *
     * @return string
     */
    public function getPqrsDescripcion()
    {
        return $this->pqrsDescripcion;
    }

    /**
     * Set pqrsFecha
     *
     * @param \DateTime $pqrsFecha
     *
     * @return Pqrs
     */
    public function setPqrsFecha($pqrsFecha)
    {
        $this->pqrsFecha = $pqrsFecha;
    
        return $this;
    }

    /**
     * Get pqrsFecha
     *
     * @return \DateTime
     */
    public function getPqrsFecha()
    {
        return $this->pqrsFecha;
    }
}

