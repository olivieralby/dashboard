<?php

namespace App\Entity;

use App\Repository\DaysRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=DaysRepository::class)
 *@ApiResource(
     *normalizationContext={"groups"={"days:read"}}
 *)
 */
class Days
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *@Groups("days:read")
     * 
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     *@Groups("days:read")
     * 
     * 
     */
    private $start;

    /**
     * @ORM\Column(type="string")
     *@Groups("days:read")
     * 
     * 
     */
    private $end;

    /**
     * @ORM\ManyToOne(targetEntity=Activite::class, inversedBy="days",cascade={"persist"})
     *@Groups("days:read", "days:write")
     * 
     * 
     */
    private $activite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStart(): ?string
    {
        return $this->start;
    }

    public function setStart(string $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd(): ?string
    {
        return $this->end;
    }

    public function setEnd(string $end): self
    {
        $this->end = $end;

        return $this;
    }

    public function getActivite(): ?Activite
    {
        return $this->activite;
    }

    public function setActivite(?Activite $activite): self
    {
        $this->activite = $activite;

        return $this;
    }
}
