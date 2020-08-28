<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClientNonSalarie
 *
 * @ORM\Table(name="client_non_salarie", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_4FC7282CDE558704", columns={"id_clients"})})
 * @ORM\Entity
 */
class ClientNonSalarie
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
