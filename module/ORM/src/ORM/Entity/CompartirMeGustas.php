<?php


namespace ORM\Entity;



use Doctrine\ORM\Mapping as ORM;

/**
 * CompartirMeGustas
 *
 * @ORM\Table(name="compartir_me_gustas")
 * @ORM\Entity
 */
class CompartirMeGustas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="compartir_me_gustas_cant", type="integer", nullable=false)
     */
    private $compartirMeGustasCant;

    /**
     * @var \Compartir
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Compartir")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="compartir_me_gusta_id", referencedColumnName="compartir_id")
     * })
     */
    private $compartirMeGusta;


    /**
     * Set compartirMeGustasCant
     *
     * @param integer $compartirMeGustasCant
     *
     * @return CompartirMeGustas
     */
    public function setCompartirMeGustasCant($compartirMeGustasCant)
    {
        $this->compartirMeGustasCant = $compartirMeGustasCant;
    
        return $this;
    }

    /**
     * Get compartirMeGustasCant
     *
     * @return integer
     */
    public function getCompartirMeGustasCant()
    {
        return $this->compartirMeGustasCant;
    }

    /**
     * Set compartirMeGusta
     *
     * @param \Compartir $compartirMeGusta
     *
     * @return CompartirMeGustas
     */
    public function setCompartirMeGusta(\Compartir $compartirMeGusta)
    {
        $this->compartirMeGusta = $compartirMeGusta;
    
        return $this;
    }

    /**
     * Get compartirMeGusta
     *
     * @return \Compartir
     */
    public function getCompartirMeGusta()
    {
        return $this->compartirMeGusta;
    }
}

