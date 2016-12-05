<?php


namespace ORM\Entity;



use Doctrine\ORM\Mapping as ORM;

/**
 * CuentaBancaria
 *
 * @ORM\Table(name="cuenta_bancaria")
 * @ORM\Entity(repositoryClass="ORM\Repository\CuentaBancariaRepository")
 */
class CuentaBancaria
{
    /**
     * @var string
     *
     * @ORM\Column(name="cuentaban_nro_cuenta", type="decimal", precision=10, scale=0, nullable=false)
     * @ORM\Id
     */
    private $cuentabanNroCuenta;

    /**
     * @var string
     *
     * @ORM\Column(name="cuentaban_entidad_bancaria", type="string", length=100, nullable=false)
     */
    private $cuentabanEntidadBancaria;

    /**
     * @var string
     *
     * @ORM\Column(name="cuentaban_tipo_tarjeta", type="string", length=100, nullable=false)
     */
    private $cuentabanTipoTarjeta;

    /**
     * @var string
     *
     * @ORM\Column(name="cuentaban_codigo_postal", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $cuentabanCodigoPostal;

    /**
     * @var string
     *
     * @ORM\Column(name="cuentaban_pais", type="string", length=80, nullable=false)
     */
    private $cuentabanPais;


    /**
     * Get cuentabanNroCuenta
     *
     * @return string
     */
    public function getCuentabanNroCuenta()
    {
        return $this->cuentabanNroCuenta;
    }

    /**
     * Set cuentabanNroCuenta
     *
     * @param string $cuentabanNroCuenta
     *
     * @return CuentaBancaria
     */
    public function setCuentabanNroCuenta($cuentabanNroCuenta)
    {
        $this->cuentabanNroCuenta = $cuentabanNroCuenta;
    
        return $this;
    }

    /**
     * Set cuentabanEntidadBancaria
     *
     * @param string $cuentabanEntidadBancaria
     *
     * @return CuentaBancaria
     */
    public function setCuentabanEntidadBancaria($cuentabanEntidadBancaria)
    {
        $this->cuentabanEntidadBancaria = $cuentabanEntidadBancaria;
    
        return $this;
    }

    /**
     * Get cuentabanEntidadBancaria
     *
     * @return string
     */
    public function getCuentabanEntidadBancaria()
    {
        return $this->cuentabanEntidadBancaria;
    }

    /**
     * Set cuentabanTipoTarjeta
     *
     * @param string $cuentabanTipoTarjeta
     *
     * @return CuentaBancaria
     */
    public function setCuentabanTipoTarjeta($cuentabanTipoTarjeta)
    {
        $this->cuentabanTipoTarjeta = $cuentabanTipoTarjeta;
    
        return $this;
    }

    /**
     * Get cuentabanTipoTarjeta
     *
     * @return string
     */
    public function getCuentabanTipoTarjeta()
    {
        return $this->cuentabanTipoTarjeta;
    }

    /**
     * Set cuentabanCodigoPostal
     *
     * @param string $cuentabanCodigoPostal
     *
     * @return CuentaBancaria
     */
    public function setCuentabanCodigoPostal($cuentabanCodigoPostal)
    {
        $this->cuentabanCodigoPostal = $cuentabanCodigoPostal;
    
        return $this;
    }

    /**
     * Get cuentabanCodigoPostal
     *
     * @return string
     */
    public function getCuentabanCodigoPostal()
    {
        return $this->cuentabanCodigoPostal;
    }

    /**
     * Set cuentabanPais
     *
     * @param string $cuentabanPais
     *
     * @return CuentaBancaria
     */
    public function setCuentabanPais($cuentabanPais)
    {
        $this->cuentabanPais = $cuentabanPais;
    
        return $this;
    }

    /**
     * Get cuentabanPais
     *
     * @return string
     */
    public function getCuentabanPais()
    {
        return $this->cuentabanPais;
    }
}

