<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * EtatCompte
 *
 * @ORM\Table(name="etat_compte")
 * @ORM\Entity
 */
class EtatCompte
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="etat_compte", type="string", length=255, nullable=false)
     */
    private $etatCompte;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_changement_etat", type="datetime", nullable=false)
     */
    private $dateChangementEtat;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Comptes", mappedBy="etatcompte")
     */
    private $comptes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comptes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtatCompte(): ?string
    {
        return $this->etatCompte;
    }

    public function setEtatCompte(string $etatCompte): self
    {
        $this->etatCompte = $etatCompte;

        return $this;
    }

    public function getDateChangementEtat(): ?\DateTimeInterface
    {
        return $this->dateChangementEtat;
    }

    public function setDateChangementEtat(\DateTimeInterface $dateChangementEtat): self
    {
        $this->dateChangementEtat = $dateChangementEtat;

        return $this;
    }

    /**
     * @return Collection|Comptes[]
     */
    public function getComptes(): Collection
    {
        return $this->comptes;
    }

    public function addCompte(Comptes $compte): self
    {
        if (!$this->comptes->contains($compte)) {
            $this->comptes[] = $compte;
            $compte->addEtatcompte($this);
        }

        return $this;
    }

    public function removeCompte(Comptes $compte): self
    {
        if ($this->comptes->contains($compte)) {
            $this->comptes->removeElement($compte);
            $compte->removeEtatcompte($this);
        }

        return $this;
    }

}
