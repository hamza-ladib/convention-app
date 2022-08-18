<?php

namespace App\Entity;

use App\Repository\ObservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ObservationRepository::class)
 */
class Observation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="date")
     */
    private $date_observation;

    /**
     * @ORM\ManyToOne(targetEntity=Convention::class, inversedBy="ID_observation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $convention;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDateObservation(): ?\DateTimeInterface
    {
        return $this->date_observation;
    }

    public function setDateObservation(\DateTimeInterface $date_observation): self
    {
        $this->date_observation = $date_observation;

        return $this;
    }

    public function getConvention(): ?Convention
    {
        return $this->convention;
    }

    public function setConvention(?Convention $convention): self
    {
        $this->convention = $convention;

        return $this;
    }
       /**
* toString
* @return string
*/
public function __toString(){

    return $this->id;
    }
}
