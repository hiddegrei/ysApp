<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToOne(mappedBy: 'user', cascade: ['persist', 'remove'])]
    private ?Blog $blog = null;



   

   

    

    public function __construct()
    {
        
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getBlog(): ?Blog
    {
        return $this->blog;
    }

    public function setBlog(Blog $blog): static
    {
        // set the owning side of the relation if necessary
        if ($blog->getUser() !== $this) {
            $blog->setUser($this);
        }

        $this->blog = $blog;

        return $this;
    }

    

    

    

    
}
