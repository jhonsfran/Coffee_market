<?php


namespace ORM\Entity;



use Doctrine\ORM\Mapping as ORM;

/**
 * PreferenciaCuenta
 *
 * @ORM\Table(name="preferencia_cuenta", indexes={@ORM\Index(name="IDX_DE6BE5071A2EAC64", columns={"prefcuenta_id_preferencia"})})
 * @ORM\Entity(repositoryClass="ORM\Repository\PreferenciaCuentaRepository")
 */
class PreferenciaCuenta
{
    /**
     * @var \Cuenta
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Cuenta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prefcuenta_id_cuenta", referencedColumnName="cuenta_id_cuenta")
     * })
     */
    private $prefcuentaCuenta;

    /**
     * @var \Preferencias
     *
     * @ORM\ManyToOne(targetEntity="Preferencias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prefcuenta_id_preferencia", referencedColumnName="preferencia_id_preferencia")
     * })
     */
    private $prefcuentaPreferencia;


    /**
     * Set prefcuentaCuenta
     *
     * @param \Cuenta $prefcuentaCuenta
     *
     * @return PreferenciaCuenta
     */
    public function setPrefcuentaCuenta(Cuenta $prefcuentaCuenta)
    {
        $this->prefcuentaCuenta = $prefcuentaCuenta;
    
        return $this;
    }

    /**
     * Get prefcuentaCuenta
     *
     * @return \Cuenta
     */
    public function getPrefcuentaCuenta()
    {
        return $this->prefcuentaCuenta;
    }

    /**
     * Set prefcuentaPreferencia
     *
     * @param \Preferencias $prefcuentaPreferencia
     *
     * @return PreferenciaCuenta
     */
    public function setPrefcuentaPreferencia(Preferencias $prefcuentaPreferencia = null)
    {
        $this->prefcuentaPreferencia = $prefcuentaPreferencia;
    
        return $this;
    }

    /**
     * Get prefcuentaPreferencia
     *
     * @return \Preferencias
     */
    public function getPrefcuentaPreferencia()
    {
        return $this->prefcuentaPreferencia;
    }
}

