<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function createUser(array $userData): User
    {
        $user = new User();
        $user->name = $userData['name'];
        $user->email = $userData['email'];
        $user->password = bcrypt($userData['password']);
        $user->save();

        return $user;
    }

    public function updateUser(int $userId, array $userData): bool
    {
        $user = User::find($userId);
        if (!$user) {
            return false;
        }

        $user->name = $userData['name'] ?? $user->name;
        $user->email = $userData['email'] ?? $user->email;
        if (isset($userData['password'])) {
            $user->password = bcrypt($userData['password']);
        }
        $user->save();

        return true;
    }
    public function getUserIcon(int $userId): ?string
{
    $user = User::where('id', $userId)->first();
    if (!$user) {
        return null;
    }

    return $user->icon_path;
}

    public function deleteUser(int $userId): bool
    {
        $user = User::find($userId);
        if (!$user) {
            return false;
        }

        $user->delete();

        return true;
    }

    public function getUserById(int $userId): ?User
    {
        return User::find($userId);
    }

    public function getUserByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }
}
