<?php


namespace ORM\Entity;



use Doctrine\ORM\Mapping as ORM;

/**
 * Cafe
 *
 * @ORM\Table(name="cafe", indexes={@ORM\Index(name="IDX_4FBD7F1060B113D", columns={"cafe_id_finca"}), @ORM\Index(name="IDX_4FBD7F10EEEB46E8", columns={"cafe_id_origen"}), @ORM\Index(name="IDX_4FBD7F10ACA29BD", columns={"cafe_id_perfil"}), @ORM\Index(name="IDX_4FBD7F10B23CDFE8", columns={"cafe_id_producto"}), @ORM\Index(name="IDX_4FBD7F10C26AA908", columns={"cafe_id_productor"}), @ORM\Index(name="IDX_4FBD7F109529BEE2", columns={"cafe_id_tipo"}), @ORM\Index(name="IDX_4FBD7F10908CFB4E", columns={"cafe_id_variedad"})})
 * @ORM\Entity
 */
class Cafe
{
    /**
     * @var \Finca
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Finca")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cafe_id_finca", referencedColumnName="finca_id_finca")
     * })
     */
    private $cafeFinca;

    /**
     * @var \Origen
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Origen")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cafe_id_origen", referencedColumnName="tipo_id_origen")
     * })
     */
    private $cafeOrigen;

    /**
     * @var \Perfil
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Perfil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cafe_id_perfil", referencedColumnName="perfil_id_perfil")
     * })
     */
    private $cafePerfil;

    /**
     * @var \Producto
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Producto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cafe_id_producto", referencedColumnName="producto_id_producto")
     * })
     */
    private $cafeProducto;

    /**
     * @var \Productor
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Productor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cafe_id_productor", referencedColumnName="productor_id_productor")
     * })
     */
    private $cafeProductor;

    /**
     * @var \Tipo
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Tipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cafe_id_tipo", referencedColumnName="tipo_id_tipo")
     * })
     */
    private $cafeTipo;

    /**
     * @var \Variedad
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Variedad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cafe_id_variedad", referencedColumnName="variedad_id_variedad")
     * })
     */
    private $cafeVariedad;


    /**
     * Set cafeFinca
     *
     * @param \Finca $cafeFinca
     *
     * @return Cafe
     */
    public function setCafeFinca(\Finca $cafeFinca)
    {
        $this->cafeFinca = $cafeFinca;
    
        return $this;
    }

    /**
     * Get cafeFinca
     *
     * @return \Finca
     */
    public function getCafeFinca()
    {
        return $this->cafeFinca;
    }

    /**
     * Set cafeOrigen
     *
     * @param \Origen $cafeOrigen
     *
     * @return Cafe
     */
    public function setCafeOrigen(\Origen $cafeOrigen)
    {
        $this->cafeOrigen = $cafeOrigen;
    
        return $this;
    }

    /**
     * Get cafeOrigen
     *
     * @return \Origen
     */
    public function getCafeOrigen()
    {
        return $this->cafeOrigen;
    }

    /**
     * Set cafePerfil
     *
     * @param \Perfil $cafePerfil
     *
     * @return Cafe
     */
    public function setCafePerfil(\Perfil $cafePerfil)
    {
        $this->cafePerfil = $cafePerfil;
    
        return $this;
    }

    /**
     * Get cafePerfil
     *
     * @return \Perfil
     */
    public function getCafePerfil()
    {
        return $this->cafePerfil;
    }

    /**
     * Set cafeProducto
     *
     * @param \Producto $cafeProducto
     *
     * @return Cafe
     */
    public function setCafeProducto(\Producto $cafeProducto)
    {
        $this->cafeProducto = $cafeProducto;
    
        return $this;
    }

    /**
     * Get cafeProducto
     *
     * @return \Producto
     */
    public function getCafeProducto()
    {
        return $this->cafeProducto;
    }

    /**
     * Set cafeProductor
     *
     * @param \Productor $cafeProductor
     *
     * @return Cafe
     */
    public function setCafeProductor(\Productor $cafeProductor)
    {
        $this->cafeProductor = $cafeProductor;
    
        return $this;
    }

    /**
     * Get cafeProductor
     *
     * @return \Productor
     */
    public function getCafeProductor()
    {
        return $this->cafeProductor;
    }

    /**
     * Set cafeTipo
     *
     * @param \Tipo $cafeTipo
     *
     * @return Cafe
     */
    public function setCafeTipo(\Tipo $cafeTipo)
    {
        $this->cafeTipo = $cafeTipo;
    
        return $this;
    }

    /**
     * Get cafeTipo
     *
     * @return \Tipo
     */
    public function getCafeTipo()
    {
        return $this->cafeTipo;
    }

    /**
     * Set cafeVariedad
     *
     * @param \Variedad $cafeVariedad
     *
     * @return Cafe
     */
    public function setCafeVariedad(\Variedad $cafeVariedad)
    {
        $this->cafeVariedad = $cafeVariedad;
    
        return $this;
    }

    /**
     * Get cafeVariedad
     *
     * @return \Variedad
     */
    public function getCafeVariedad()
    {
        return $this->cafeVariedad;
    }
}

