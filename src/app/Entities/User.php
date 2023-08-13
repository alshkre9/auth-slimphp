<?php

declare(strict_types=1);

namespace App\Entities;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: "users")]
class User
{
    #[Id, Column(type: 'integer'), GeneratedValue]
    private int|null $id = null;
    #[Column(type: "string")]
    private string $email;
    #[Column(type: "string")]
    private string $username;
    #[Column(type: "string")]
    private string $hash;

    public function getId(): int
    {
        return $this->id;
    }
    
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setUsername($username): void
    {
        $this->username = $username;
    }
    
    public function getUsername(): string
    {
        return $this->username;
    }
    
    public function setHash(string $hash): void
    {
        $this->hash = $hash;
    }

    public function getHash(): string
    {
        return $this->hash;
    }
}