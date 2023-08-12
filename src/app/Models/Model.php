<?php

declare(strict_types=1);

namespace App\Models;

use Doctrine\ORM\EntityManager;

abstract class Model
{
    protected EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
}