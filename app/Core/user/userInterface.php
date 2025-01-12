<?php

namespace App\Core\user;

interface userInterface
{
    public function getAlluser();
    public function getUserById($id);
    public function updateUser($id, array $data);
    public function deleteUser($id);
   
    
}