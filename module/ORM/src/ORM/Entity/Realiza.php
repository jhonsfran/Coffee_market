<?php

namespace ORM\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Realiza
 *
 * @ORM\Table(name="realiza", indexes={@ORM\Index(name="IDX_C363A6CEDC5A9465", columns={"realizacuenta_id_cuenta"}), @ORM\Index(name="IDX_C363A6CE9CA2027", columns={"realizapqrs_id_pgrs"}), @ORM\Index(name="IDX_C363A6CE20C6058D", columns={"realizausr_nickname"})})
 * @ORM\Entity
 */
class Realiza
{
    /**
     * @var \Cuenta
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Cuenta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="realizacuenta_id_cuenta", referencedColumnName="cuenta_id_cuenta")
     * })
     */
    private $realizacuentaCuenta;

    /**
     * @var \Pqrs
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Pqrs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="realizapqrs_id_pgrs", referencedColumnName="pqrs_id_pgrs")
     * })
     */
    private $realizapqrsPgrs;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="realizausr_nickname", referencedColumnName="usuario_nickname")
     * })
     */
    private $realizausrNickname;


    /**
     * Set realizacuentaCuenta
     *
     * @param \Cuenta $realizacuentaCuenta
     *
     * @return Realiza
     */
    public function setRealizacuentaCuenta(\Cuenta $realizacuentaCuenta)
    {
        $this->realizacuentaCuenta = $realizacuentaCuenta;
    
        return $this;
    }

    /**
     * Get realizacuentaCuenta
     *
     * @return \Cuenta
     */
    public function getRealizacuentaCuenta()
    {
        return $this->realizacuentaCuenta;
    }

    /**
     * Set realizapqrsPgrs
     *
     * @param \Pqrs $realizapqrsPgrs
     *
     * @return Realiza
     */
    public function setRealizapqrsPgrs(\Pqrs $realizapqrsPgrs)
    {
        $this->realizapqrsPgrs = $realizapqrsPgrs;
    
        return $this;
    }

    /**
     * Get realizapqrsPgrs
     *
     * @return \Pqrs
     */
    public function getRealizapqrsPgrs()
    {
        return $this->realizapqrsPgrs;
    }

    /**
     * Set realizausrNickname
     *
     * @param \Usuario $realizausrNickname
     *
     * @return Realiza
     */
    public function setRealizausrNickname(\Usuario $realizausrNickname = null)
    {
        $this->realizausrNickname = $realizausrNickname;
    
        return $this;
    }

    /**
     * Get realizausrNickname
     *
     * @return \Usuario
     */
    public function getRealizausrNickname()
    {
        return $this->realizausrNickname;
    }
}

