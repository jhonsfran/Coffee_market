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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Cuenta", mappedBy="respondePqrsPgrs")
     */
    private $respondeCuentaCuenta;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Cuenta", inversedBy="realizapqrsPgrs")
     * @ORM\JoinTable(name="realiza",
     *   joinColumns={
     *     @ORM\JoinColumn(name="realizapqrs_id_pgrs", referencedColumnName="pqrs_id_pgrs")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="realizacuenta_id_cuenta", referencedColumnName="cuenta_id_cuenta")
     *   }
     * )
     */
    private $realizacuentaCuenta;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->respondeCuentaCuenta = new \Doctrine\Common\Collections\ArrayCollection();
        $this->realizacuentaCuenta = new \Doctrine\Common\Collections\ArrayCollection();
    }

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

    /**
     * Add respondeCuentaCuentum
     *
     * @param \Cuenta $respondeCuentaCuentum
     *
     * @return Pqrs
     */
    public function addRespondeCuentaCuentum(\Cuenta $respondeCuentaCuentum)
    {
        $this->respondeCuentaCuenta[] = $respondeCuentaCuentum;
    
        return $this;
    }

    /**
     * Remove respondeCuentaCuentum
     *
     * @param \Cuenta $respondeCuentaCuentum
     */
    public function removeRespondeCuentaCuentum(\Cuenta $respondeCuentaCuentum)
    {
        $this->respondeCuentaCuenta->removeElement($respondeCuentaCuentum);
    }

    /**
     * Get respondeCuentaCuenta
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRespondeCuentaCuenta()
    {
        return $this->respondeCuentaCuenta;
    }

    /**
     * Add realizacuentaCuentum
     *
     * @param \Cuenta $realizacuentaCuentum
     *
     * @return Pqrs
     */
    public function addRealizacuentaCuentum(\Cuenta $realizacuentaCuentum)
    {
        $this->realizacuentaCuenta[] = $realizacuentaCuentum;
    
        return $this;
    }

    /**
     * Remove realizacuentaCuentum
     *
     * @param \Cuenta $realizacuentaCuentum
     */
    public function removeRealizacuentaCuentum(\Cuenta $realizacuentaCuentum)
    {
        $this->realizacuentaCuenta->removeElement($realizacuentaCuentum);
    }

    /**
     * Get realizacuentaCuenta
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRealizacuentaCuenta()
    {
        return $this->realizacuentaCuenta;
    }
}

