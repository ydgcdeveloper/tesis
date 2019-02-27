<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profes
 *
 * @ORM\Table(name="profes")
 * @ORM\Entity
 */
class Profes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="profes_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apell", type="string", length=255, nullable=false)
     */
    private $apell;

    /**
     * @var string
     *
     * @ORM\Column(name="fac", type="string", length=255, nullable=false)
     */
    private $fac;

    /**
     * @var string
     *
     * @ORM\Column(name="depar", type="string", length=255, nullable=false)
     */
    private $depar;

    /**
     * @var string
     *
     * @ORM\Column(name="cen_estu", type="string", length=255, nullable=false)
     */
    private $cenEstu;

    /**
     * @var string
     *
     * @ORM\Column(name="categ_docent", type="string", length=255, nullable=false)
     */
    private $categDocent;

    /**
     * @var string
     *
     * @ORM\Column(name="grado_acad", type="string", length=255, nullable=false)
     */
    private $gradoAcad;

    /**
     * @var string
     *
     * @ORM\Column(name="grado_cient", type="string", length=255, nullable=false)
     */
    private $gradoCient;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cuadro", type="boolean", nullable=false)
     */
    private $cuadro;

    /**
     * @var string
     *
     * @ORM\Column(name="cargo", type="string", length=255, nullable=false)
     */
    private $cargo;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=255, nullable=false)
     */
    private $correo;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Profes
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apell
     *
     * @param string $apell
     *
     * @return Profes
     */
    public function setApell($apell)
    {
        $this->apell = $apell;

        return $this;
    }

    /**
     * Get apell
     *
     * @return string
     */
    public function getApell()
    {
        return $this->apell;
    }

    /**
     * Set fac
     *
     * @param string $fac
     *
     * @return Profes
     */
    public function setFac($fac)
    {
        $this->fac = $fac;

        return $this;
    }

    /**
     * Get fac
     *
     * @return string
     */
    public function getFac()
    {
        return $this->fac;
    }

    /**
     * Set depar
     *
     * @param string $depar
     *
     * @return Profes
     */
    public function setDepar($depar)
    {
        $this->depar = $depar;

        return $this;
    }

    /**
     * Get depar
     *
     * @return string
     */
    public function getDepar()
    {
        return $this->depar;
    }

    /**
     * Set cenEstu
     *
     * @param string $cenEstu
     *
     * @return Profes
     */
    public function setCenEstu($cenEstu)
    {
        $this->cenEstu = $cenEstu;

        return $this;
    }

    /**
     * Get cenEstu
     *
     * @return string
     */
    public function getCenEstu()
    {
        return $this->cenEstu;
    }

    /**
     * Set categDocent
     *
     * @param string $categDocent
     *
     * @return Profes
     */
    public function setCategDocent($categDocent)
    {
        $this->categDocent = $categDocent;

        return $this;
    }

    /**
     * Get categDocent
     *
     * @return string
     */
    public function getCategDocent()
    {
        return $this->categDocent;
    }

    /**
     * Set gradoAcad
     *
     * @param string $gradoAcad
     *
     * @return Profes
     */
    public function setGradoAcad($gradoAcad)
    {
        $this->gradoAcad = $gradoAcad;

        return $this;
    }

    /**
     * Get gradoAcad
     *
     * @return string
     */
    public function getGradoAcad()
    {
        return $this->gradoAcad;
    }

    /**
     * Set gradoCient
     *
     * @param string $gradoCient
     *
     * @return Profes
     */
    public function setGradoCient($gradoCient)
    {
        $this->gradoCient = $gradoCient;

        return $this;
    }

    /**
     * Get gradoCient
     *
     * @return string
     */
    public function getGradoCient()
    {
        return $this->gradoCient;
    }

    /**
     * Set cuadro
     *
     * @param boolean $cuadro
     *
     * @return Profes
     */
    public function setCuadro($cuadro)
    {
        $this->cuadro = $cuadro;

        return $this;
    }

    /**
     * Get cuadro
     *
     * @return boolean
     */
    public function getCuadro()
    {
        return $this->cuadro;
    }

    /**
     * Set cargo
     *
     * @param string $cargo
     *
     * @return Profes
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get cargo
     *
     * @return string
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set correo
     *
     * @param string $correo
     *
     * @return Profes
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo
     *
     * @return string
     */
    public function getCorreo()
    {
        return $this->correo;
    }
}
