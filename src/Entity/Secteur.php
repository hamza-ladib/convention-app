<?php

namespace App\Entity;

use App\Repository\SecteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SecteurRepository::class)
 */
class Secteur
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
    private $libelles;

    /**
     * @ORM\ManyToMany(targetEntity=Convention::class, mappedBy="ID_secteur")
     */
    private $conventions;

    public function __construct()
    {
        $this->conventions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelles(): ?string
    {
        return $this->libelles;
    }

    public function setLibelles(string $libelles): self
    {
        $this->libelles = $libelles;

        return $this;
    }

    /**
     * @return Collection<int, Convention>
     */
    public function getConventions(): Collection
    {
        return $this->conventions;
    }

    public function addConvention(Convention $convention): self
    {
        if (!$this->conventions->contains($convention)) {
            $this->conventions[] = $convention;
            $convention->addIDSecteur($this);
        }

        return $this;
    }

    public function removeConvention(Convention $convention): self
    {
        if ($this->conventions->removeElement($convention)) {
            $convention->removeIDSecteur($this);
        }

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
