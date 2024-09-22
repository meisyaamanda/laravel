<?php

namespace App\Services\Implement;
use App\Services\UserService;

class UserServiceImplement implements UserService
{
    private array $users = [
        "meisya" => "meisya123",
    ];

    public function login(string $user, string $password): bool
    {
        if (!isset($this->users[$user])) {
            return false;
        }

        $correctPassword = $this->users[$user];
        return $password === $correctPassword;
    }
}
