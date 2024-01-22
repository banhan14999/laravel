<?php

namespace App\Http\Services;

use App\Http\Repositories\UserRepository;

class UserService
{
    private UserRepository $user_repository;

    public function __construct(UserRepository $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    public function getUsers()
    {
        try {
            return $this->user_repository->getUsers();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
