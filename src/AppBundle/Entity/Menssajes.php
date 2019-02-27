<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Menssajes
 *
 * @ORM\Table(name="menssajes", indexes={@ORM\Index(name="fki_destinatario", columns={"destinatario_id"})})
 * @ORM\Entity
 */
class Menssajes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="menssajes_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="menj", type="string", length=255, nullable=true)
     */
    private $menj;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="destinatario_id", referencedColumnName="id")
     * })
     */
    private $destinatario;



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
     * Set menj
     *
     * @param string $menj
     *
     * @return Menssajes
     */
    public function setMenj($menj)
    {
        $this->menj = $menj;

        return $this;
    }

    /**
     * Get menj
     *
     * @return string
     */
    public function getMenj()
    {
        return $this->menj;
    }

    /**
     * Set destinatario
     *
     * @param \AppBundle\Entity\Users $destinatario
     *
     * @return Menssajes
     */
    public function setDestinatario(\AppBundle\Entity\Users $destinatario = null)
    {
        $this->destinatario = $destinatario;

        return $this;
    }

    /**
     * Get destinatario
     *
     * @return \AppBundle\Entity\Users
     */
    public function getDestinatario()
    {
        return $this->destinatario;
    }
}
