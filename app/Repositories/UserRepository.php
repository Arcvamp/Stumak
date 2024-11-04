<?php
// app/Repositories/UserRepository.php
namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function all()
    {
        return User::all();
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function create(array $data)
    {
        return User::create($data);
    }

    public function update($id, array $data)
    {
        $user = User::find($id);
        if ($user) {
            $user->update($data);
            return $user;
        }

        return null;
    }

    public function delete($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return true;
        }

        return false;
    }
}
