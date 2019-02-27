<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstExt
 *
 * @ORM\Table(name="est_ext", indexes={@ORM\Index(name="tipo_est_id", columns={"tipo_est_id"}), @ORM\Index(name="fki_pais_id", columns={"pais_id"}), @ORM\Index(name="fki_carrera_id", columns={"carrera_id"})})
 * @ORM\Entity
 */
class EstExt
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="est_ext_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ces", type="string", length=255, nullable=false)
     */
    private $ces;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apell1", type="string", length=255, nullable=true)
     */
    private $apell1;

    /**
     * @var string
     *
     * @ORM\Column(name="apell2", type="string", length=255, nullable=true)
     */
    private $apell2;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=255, nullable=true)
     */
    private $sexo;

    /**
     * @var string
     *
     * @ORM\Column(name="bajas", type="string", length=20, nullable=true)
     */
    private $bajas;

    /**
     * @var string
     *
     * @ORM\Column(name="licencias", type="string", length=20, nullable=true)
     */
    private $licencias;

    /**
     * @var string
     *
     * @ORM\Column(name="altas", type="string", length=20, nullable=true)
     */
    private $altas;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_carrera", type="string", length=10, nullable=true)
     */
    private $codigoCarrera;

    /**
     * @var string
     *
     * @ORM\Column(name="anno_estudio", type="string", length=1, nullable=true)
     */
    private $annoEstudio;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string", nullable=true)
     */
    private $observaciones;

    /**
     * @var \TipoEst
     *
     * @ORM\ManyToOne(targetEntity="TipoEst")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_est_id", referencedColumnName="id")
     * })
     */
    private $tipoEst;

    /**
     * @var \Pais
     *
     * @ORM\ManyToOne(targetEntity="Pais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pais_id", referencedColumnName="id")
     * })
     */
    private $pais;

    /**
     * @var \Carrera
     *
     * @ORM\ManyToOne(targetEntity="Carrera")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="carrera_id", referencedColumnName="id")
     * })
     */
    private $carrera;



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
     * Set ces
     *
     * @param string $ces
     *
     * @return EstExt
     */
    public function setCes($ces)
    {
        $this->ces = $ces;

        return $this;
    }

    /**
     * Get ces
     *
     * @return string
     */
    public function getCes()
    {
        return $this->ces;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return EstExt
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
     * Set apell1
     *
     * @param string $apell1
     *
     * @return EstExt
     */
    public function setApell1($apell1)
    {
        $this->apell1 = $apell1;

        return $this;
    }

    /**
     * Get apell1
     *
     * @return string
     */
    public function getApell1()
    {
        return $this->apell1;
    }

    /**
     * Set apell2
     *
     * @param string $apell2
     *
     * @return EstExt
     */
    public function setApell2($apell2)
    {
        $this->apell2 = $apell2;

        return $this;
    }

    /**
     * Get apell2
     *
     * @return string
     */
    public function getApell2()
    {
        return $this->apell2;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     *
     * @return EstExt
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set bajas
     *
     * @param string $bajas
     *
     * @return EstExt
     */
    public function setBajas($bajas)
    {
        $this->bajas = $bajas;

        return $this;
    }

    /**
     * Get bajas
     *
     * @return string
     */
    public function getBajas()
    {
        return $this->bajas;
    }

    /**
     * Set licencias
     *
     * @param string $licencias
     *
     * @return EstExt
     */
    public function setLicencias($licencias)
    {
        $this->licencias = $licencias;

        return $this;
    }

    /**
     * Get licencias
     *
     * @return string
     */
    public function getLicencias()
    {
        return $this->licencias;
    }

    /**
     * Set altas
     *
     * @param string $altas
     *
     * @return EstExt
     */
    public function setAltas($altas)
    {
        $this->altas = $altas;

        return $this;
    }

    /**
     * Get altas
     *
     * @return string
     */
    public function getAltas()
    {
        return $this->altas;
    }

    /**
     * Set codigoCarrera
     *
     * @param string $codigoCarrera
     *
     * @return EstExt
     */
    public function setCodigoCarrera($codigoCarrera)
    {
        $this->codigoCarrera = $codigoCarrera;

        return $this;
    }

    /**
     * Get codigoCarrera
     *
     * @return string
     */
    public function getCodigoCarrera()
    {
        return $this->codigoCarrera;
    }

    /**
     * Set annoEstudio
     *
     * @param string $annoEstudio
     *
     * @return EstExt
     */
    public function setAnnoEstudio($annoEstudio)
    {
        $this->annoEstudio = $annoEstudio;

        return $this;
    }

    /**
     * Get annoEstudio
     *
     * @return string
     */
    public function getAnnoEstudio()
    {
        return $this->annoEstudio;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     *
     * @return EstExt
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set tipoEst
     *
     * @param \AppBundle\Entity\TipoEst $tipoEst
     *
     * @return EstExt
     */
    public function setTipoEst(\AppBundle\Entity\TipoEst $tipoEst = null)
    {
        $this->tipoEst = $tipoEst;

        return $this;
    }

    /**
     * Get tipoEst
     *
     * @return \AppBundle\Entity\TipoEst
     */
    public function getTipoEst()
    {
        return $this->tipoEst;
    }

    /**
     * Set pais
     *
     * @param \AppBundle\Entity\Pais $pais
     *
     * @return EstExt
     */
    public function setPais(\AppBundle\Entity\Pais $pais = null)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return \AppBundle\Entity\Pais
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set carrera
     *
     * @param \AppBundle\Entity\Carrera $carrera
     *
     * @return EstExt
     */
    public function setCarrera(\AppBundle\Entity\Carrera $carrera = null)
    {
        $this->carrera = $carrera;

        return $this;
    }

    /**
     * Get carrera
     *
     * @return \AppBundle\Entity\Carrera
     */
    public function getCarrera()
    {
        return $this->carrera;
    }
}
