<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstNac
 *
 * @ORM\Table(name="est_nac")
 * @ORM\Entity
 */
class EstNac
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="est_nac_id_seq", allocationSize=1, initialValue=1)
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
     * @ORM\Column(name="depart", type="string", length=255, nullable=false)
     */
    private $depart;

    /**
     * @var string
     *
     * @ORM\Column(name="cen_est", type="string", length=255, nullable=false)
     */
    private $cenEst;

    /**
     * @var string
     *
     * @ORM\Column(name="categ_docente", type="string", length=255, nullable=false)
     */
    private $categDocente;

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
     * @var string
     *
     * @ORM\Column(name="cargo", type="string", length=255, nullable=true)
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
     * @return EstNac
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
     * @return EstNac
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
     * @return EstNac
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
     * Set depart
     *
     * @param string $depart
     *
     * @return EstNac
     */
    public function setDepart($depart)
    {
        $this->depart = $depart;

        return $this;
    }

    /**
     * Get depart
     *
     * @return string
     */
    public function getDepart()
    {
        return $this->depart;
    }

    /**
     * Set cenEst
     *
     * @param string $cenEst
     *
     * @return EstNac
     */
    public function setCenEst($cenEst)
    {
        $this->cenEst = $cenEst;

        return $this;
    }

    /**
     * Get cenEst
     *
     * @return string
     */
    public function getCenEst()
    {
        return $this->cenEst;
    }

    /**
     * Set categDocente
     *
     * @param string $categDocente
     *
     * @return EstNac
     */
    public function setCategDocente($categDocente)
    {
        $this->categDocente = $categDocente;

        return $this;
    }

    /**
     * Get categDocente
     *
     * @return string
     */
    public function getCategDocente()
    {
        return $this->categDocente;
    }

    /**
     * Set gradoAcad
     *
     * @param string $gradoAcad
     *
     * @return EstNac
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
     * @return EstNac
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
     * Set cargo
     *
     * @param string $cargo
     *
     * @return EstNac
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
     * @return EstNac
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
