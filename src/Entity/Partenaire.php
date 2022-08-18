<?php

namespace App\Entity;

use App\Repository\PartenaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartenaireRepository::class)
 */
class Partenaire
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
    private $libellep;

    /**
     * @ORM\Column(type="float")
     */
    private $contributionp;

    /**
     * @ORM\ManyToOne(targetEntity=Convention::class, inversedBy="ID_partenaire")
     * @ORM\JoinColumn(nullable=false)
     */
    private $convention;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibellep(): ?string
    {
        return $this->libellep;
    }

    public function setLibellep(string $libellep): self
    {
        $this->libellep = $libellep;

        return $this;
    }

    public function getContributionp(): ?float
    {
        return $this->contributionp;
    }

    public function setContributionp(float $contributionp): self
    {
        $this->contributionp = $contributionp;

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
