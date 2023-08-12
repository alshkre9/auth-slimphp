<?php

declare(strict_types=1);

namespace App\Entities;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;

#[Entity]
class User
{
    #[Id, Column(type: 'integer'), GeneratedValue]
    private int|null $id = null;
    #[Column(type: "string")]
    private string $email;
    #[Column(type: "string")]
    private string $hash;

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
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