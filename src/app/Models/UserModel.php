<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\User;
use App\Models\Model;

class UserModel extends Model
{
    public function create($email, $username,  $password): bool
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 8 || !$username)
        {
            return false;
        }
        $user = new User();
        $user->setEmail($email);
        $user->setUsername($username);
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $user->setHash($hash);
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        return true;
    }
    public function getUser($email, $password): User|null
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

    public function get($id): User
    {
        return $this->entityManager->getRepository(User::class)->find($id);
    }
}