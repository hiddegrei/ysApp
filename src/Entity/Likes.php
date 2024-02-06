<?php

namespace App\Entity;

use App\Repository\LikesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LikesRepository::class)]
class Likes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $blog = null;

    #[ORM\Column]
    private ?int $user = null;

    #[ORM\Column]
    private ?int $likeValue = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBlog(): ?int
    {
        return $this->blog;
    }

    public function setBlog(int $blog): static
    {
        $this->blog = $blog;

        return $this;
    }

    public function getUser(): ?int
    {
        return $this->user;
    }

    public function setUser(int $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getLikeValue(): ?int
    {
        return $this->likeValue;
    }

    public function setLikeValue(int $likeValue): static
    {
        $this->likeValue = $likeValue;

        return $this;
    }
}
