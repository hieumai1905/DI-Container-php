<?php

namespace Services;
require_once 'IUserService.php';
class UserService implements IUserService
{

    public function getAll()
    {
        echo "Get all users";
    }
}