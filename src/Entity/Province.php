<?php

namespace App\Entity;

use App\Repository\ProvinceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProvinceRepository::class)
 */
class Province
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
     * @ORM\OneToOne(targetEntity=Convention::class, mappedBy="ID_province", cascade={"persist", "remove"})
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

    public function getConvention(): ?Convention
    {
        return $this->convention;
    }

    public function setConvention(Convention $convention): self
    {
        // set the owning side of the relation if necessary
        if ($convention->getIDProvince() !== $this) {
            $convention->setIDProvince($this);
        }

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
