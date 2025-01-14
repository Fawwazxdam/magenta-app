<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserService
{
    public function getUsers(array $params = [])
    {
        return User::all();
    }

    public function getUser(string $ID)
    {
        return User::find($ID);
    }

    public function getUserByUuid(string $uuid)
    {
        return User::where('uuid', $uuid)->first();
    }

    public function createUser(array $data)
    {
        return User::create($data);
    }

    public function updateUser(array $data, string $ID)
    {
        return User::where('id', $ID)->update($data);
    }

    public function deleteUser(string $ID)
    {
        return User::find($ID)->delete();
    }
}
