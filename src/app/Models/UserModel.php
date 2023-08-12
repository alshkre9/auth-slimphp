<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\User;
use App\Models\Model;

class UserModel extends Model
{
    public function create($email, $password): User
    {
        $user = new User();
        $user->setEmail($email);
        $hash = $password;
        $user->setHash($hash);
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        return $user;
    } 
}