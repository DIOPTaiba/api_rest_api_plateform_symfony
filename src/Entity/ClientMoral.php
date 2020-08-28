<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClientMoral
 *
 * @ORM\Table(name="client_moral", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_83FF4A8DE558704", columns={"id_clients"})})
 * @ORM\Entity
 */
class ClientMoral
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
     * @ORM\Column(name="nom_entreprise", type="string", length=255, nullable=false)
     */
    private $nomEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="identifiant_entreprise", type="string", length=255, nullable=false)
     */
    private $identifiantEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="raison_social", type="string", length=255, nullable=false)
     */
    private $raisonSocial;

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

    public function getNomEntreprise(): ?string
    {
        return $this->nomEntreprise;
    }

    public function setNomEntreprise(string $nomEntreprise): self
    {
        $this->nomEntreprise = $nomEntreprise;

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

    public function getRaisonSocial(): ?string
    {
        return $this->raisonSocial;
    }

    public function setRaisonSocial(string $raisonSocial): self
    {
        $this->raisonSocial = $raisonSocial;

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
