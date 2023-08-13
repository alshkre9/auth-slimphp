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
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $user->setHash($hash);
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        return $user;
    }
    public function get($email, $password): User|null
    {
        $users = $this->entityManager->getRepository(User::class)->findBy(["email" => "$email"]);
        foreach($users as $user)
        {
            if (password_verify($password, $user->getHash()))
            {
                return $user;
            }
        }
        return null;
    }
}