<?php

namespace App\Core\user;

use App\Models\User;



class userRepo implements userInterface
{public function getAllUser()
    {
        return User::all();
    }
    
    public function getUserById($id)
    {
        return User::findOrFail($id);
    }
    
    public function updateUser($id, array $data)
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }
    
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return true;
    }
    
    
}
