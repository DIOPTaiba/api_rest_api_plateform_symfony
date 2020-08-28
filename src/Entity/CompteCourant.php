<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompteCourant
 *
 * @ORM\Table(name="compte_courant", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_73F05D6C88EEF171", columns={"id_comptes"})})
 * @ORM\Entity
 */
class CompteCourant
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
     * @ORM\Column(name="agios", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $agios;

    /**
     * @var \Comptes
     *
     * @ORM\ManyToOne(targetEntity="Comptes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_comptes", referencedColumnName="id")
     * })
     */
    private $idComptes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAgios(): ?string
    {
        return $this->agios;
    }

    public function setAgios(string $agios): self
    {
        $this->agios = $agios;

        return $this;
    }

    public function getIdComptes(): ?Comptes
    {
        return $this->idComptes;
    }

    public function setIdComptes(?Comptes $idComptes): self
    {
        $this->idComptes = $idComptes;

        return $this;
    }


}
