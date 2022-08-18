<?php

namespace App\Entity;

use App\Repository\ConventionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConventionRepository::class)
 */
class Convention
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
    private $num_convention;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sujet_convention;

    /**
     * @ORM\Column(type="date")
     */
    private $date_convention;

    /**
     * @ORM\Column(type="float")
     */
    private $montant_global;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $situation_convention;

    /**
     * @ORM\Column(type="date")
     */
    private $date_signature;

    /**
     * @ORM\Column(type="float")
     */
    private $montant_emis;

    /**
     * @ORM\Column(type="float")
     */
    private $montant_restant;

    /**
     * @ORM\Column(type="date")
     */
    private $date_visa;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image_convention;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etat_avancement;

    /**
     * @ORM\Column(type="float")
     */
    private $pourcentage;

    /**
     * @ORM\Column(type="date")
     */
    private $date_approbation;

    /**
     * @ORM\Column(type="float")
     */
    private $contribution_region;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $saison;

    /**
     * @ORM\ManyToMany(targetEntity=Secteur::class, inversedBy="conventions")
     */
    private $ID_secteur;

    /**
     * @ORM\OneToOne(targetEntity=Province::class, inversedBy="convention", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $ID_province;

    /**
     * @ORM\OneToMany(targetEntity=Observation::class, mappedBy="convention")
     */
    private $ID_observation;

    /**
     * @ORM\OneToMany(targetEntity=Partenaire::class, mappedBy="convention")
     */
    private $ID_partenaire;

    public function __construct()
    {
        $this->ID_secteur = new ArrayCollection();
        $this->ID_observation = new ArrayCollection();
        $this->ID_partenaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumConvention(): ?string
    {
        return $this->num_convention;
    }

    public function setNumConvention(string $num_convention): self
    {
        $this->num_convention = $num_convention;

        return $this;
    }

    public function getSujetConvention(): ?string
    {
        return $this->sujet_convention;
    }

    public function setSujetConvention(string $sujet_convention): self
    {
        $this->sujet_convention = $sujet_convention;

        return $this;
    }

    public function getDateConvention(): ?\DateTimeInterface
    {
        return $this->date_convention;
    }

    public function setDateConvention(\DateTimeInterface $date_convention): self
    {
        $this->date_convention = $date_convention;

        return $this;
    }

    public function getMontantGlobal(): ?float
    {
        return $this->montant_global;
    }

    public function setMontantGlobal(float $montant_global): self
    {
        $this->montant_global = $montant_global;

        return $this;
    }

    public function getSituationConvention(): ?string
    {
        return $this->situation_convention;
    }

    public function setSituationConvention(string $situation_convention): self
    {
        $this->situation_convention = $situation_convention;

        return $this;
    }

    public function getDateSignature(): ?\DateTimeInterface
    {
        return $this->date_signature;
    }

    public function setDateSignature(\DateTimeInterface $date_signature): self
    {
        $this->date_signature = $date_signature;

        return $this;
    }

    public function getMontantEmis(): ?float
    {
        return $this->montant_emis;
    }

    public function setMontantEmis(float $montant_emis): self
    {
        $this->montant_emis = $montant_emis;

        return $this;
    }

    public function getMontantRestant(): ?float
    {
        return $this->montant_restant;
    }

    public function setMontantRestant(float $montant_restant): self
    {
        $this->montant_restant = $montant_restant;

        return $this;
    }

    public function getDateVisa(): ?\DateTimeInterface
    {
        return $this->date_visa;
    }

    public function setDateVisa(\DateTimeInterface $date_visa): self
    {
        $this->date_visa = $date_visa;

        return $this;
    }

    public function getImageConvention(): ?string
    {
        return $this->image_convention;
    }

    public function setImageConvention(string $image_convention): self
    {
        $this->image_convention = $image_convention;

        return $this;
    }

    public function getEtatAvancement(): ?string
    {
        return $this->etat_avancement;
    }

    public function setEtatAvancement(string $etat_avancement): self
    {
        $this->etat_avancement = $etat_avancement;

        return $this;
    }

    public function getPourcentage(): ?float
    {
        return $this->pourcentage;
    }

    public function setPourcentage(float $pourcentage): self
    {
        $this->pourcentage = $pourcentage;

        return $this;
    }

    public function getDateApprobation(): ?\DateTimeInterface
    {
        return $this->date_approbation;
    }

    public function setDateApprobation(\DateTimeInterface $date_approbation): self
    {
        $this->date_approbation = $date_approbation;

        return $this;
    }

    public function getContributionRegion(): ?float
    {
        return $this->contribution_region;
    }

    public function setContributionRegion(float $contribution_region): self
    {
        $this->contribution_region = $contribution_region;

        return $this;
    }

    public function getSaison(): ?string
    {
        return $this->saison;
    }

    public function setSaison(string $saison): self
    {
        $this->saison = $saison;

        return $this;
    }

    /**
     * @return Collection<int, Secteur>
     */
    public function getIDSecteur(): Collection
    {
        return $this->ID_secteur;
    }

    public function addIDSecteur(Secteur $iDSecteur): self
    {
        if (!$this->ID_secteur->contains($iDSecteur)) {
            $this->ID_secteur[] = $iDSecteur;
        }

        return $this;
    }

    public function removeIDSecteur(Secteur $iDSecteur): self
    {
        $this->ID_secteur->removeElement($iDSecteur);

        return $this;
    }

    public function getIDProvince(): ?Province
    {
        return $this->ID_province;
    }

    public function setIDProvince(Province $ID_province): self
    {
        $this->ID_province = $ID_province;

        return $this;
    }

    /**
     * @return Collection<int, Observation>
     */
    public function getIDObservation(): Collection
    {
        return $this->ID_observation;
    }

    public function addIDObservation(Observation $iDObservation): self
    {
        if (!$this->ID_observation->contains($iDObservation)) {
            $this->ID_observation[] = $iDObservation;
            $iDObservation->setConvention($this);
        }

        return $this;
    }

    public function removeIDObservation(Observation $iDObservation): self
    {
        if ($this->ID_observation->removeElement($iDObservation)) {
            // set the owning side to null (unless already changed)
            if ($iDObservation->getConvention() === $this) {
                $iDObservation->setConvention(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Partenaire>
     */
    public function getIDPartenaire(): Collection
    {
        return $this->ID_partenaire;
    }

    public function addIDPartenaire(Partenaire $iDPartenaire): self
    {
        if (!$this->ID_partenaire->contains($iDPartenaire)) {
            $this->ID_partenaire[] = $iDPartenaire;
            $iDPartenaire->setConvention($this);
        }

        return $this;
    }

    public function removeIDPartenaire(Partenaire $iDPartenaire): self
    {
        if ($this->ID_partenaire->removeElement($iDPartenaire)) {
            // set the owning side to null (unless already changed)
            if ($iDPartenaire->getConvention() === $this) {
                $iDPartenaire->setConvention(null);
            }
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
