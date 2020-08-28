<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClientSalarie
 *
 * @ORM\Table(name="client_salarie", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_D0B37E67DE558704", columns={"id_clients"})})
 * @ORM\Entity
 */
class ClientSalarie
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
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="carte_identite", type="string", length=255, nullable=false)
     */
    private $carteIdentite;

    /**
     * @var string
     *
     * @ORM\Column(name="profession", type="string", length=255, nullable=false)
     */
    private $profession;

    /**
     * @var string
     *
     * @ORM\Column(name="salaire", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $salaire;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_employeur", type="string", length=255, nullable=false)
     */
    private $nomEmployeur;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_entreprise", type="string", length=255, nullable=false)
     */
    private $adresseEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="raison_social", type="string", length=255, nullable=false)
     */
    private $raisonSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="identifiant_entreprise", type="string", length=255, nullable=false)
     */
    private $identifiantEntreprise;

    /**
     * @var \Clients
     *
     * @ORM\ManyToOne(targetEntity="Clients")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_clients", referencedColumnName="id")
     * })
     */
    private $idClients;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getCarteIdentite(): ?string
    {
        return $this->carteIdentite;
    }

    public function setCarteIdentite(string $carteIdentite): self
    {
        $this->carteIdentite = $carteIdentite;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(string $profession): self
    {
        $this->profession = $profession;

        return $this;
    }

    public function getSalaire(): ?string
    {
        return $this->salaire;
    }

    public function setSalaire(string $salaire): self
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getNomEmployeur(): ?string
    {
        return $this->nomEmployeur;
    }

    public function setNomEmployeur(string $nomEmployeur): self
    {
        $this->nomEmployeur = $nomEmployeur;

        return $this;
    }

    public function getAdresseEntreprise(): ?string
    {
        return $this->adresseEntreprise;
    }

    public function setAdresseEntreprise(string $adresseEntreprise): self
    {
        $this->adresseEntreprise = $adresseEntreprise;

        return $this;
    }

    public function getRaisonSocial(): ?string
    {
        return $this->raisonSocial;
    }

    public function setRaisonSocial(string $raisonSocial): self
    {
        $this->raisonSocial = $raisonSocial;

        return $this;
    }

    public function getIdentifiantEntreprise(): ?string
    {
        return $this->identifiantEntreprise;
    }

    public function setIdentifiantEntreprise(string $identifiantEntreprise): self
    {
        $this->identifiantEntreprise = $identifiantEntreprise;

        return $this;
    }

    public function getIdClients(): ?Clients
    {
        return $this->idClients;
    }

    public function setIdClients(?Clients $idClients): self
    {
        $this->idClients = $idClients;

        return $this;
    }


}
