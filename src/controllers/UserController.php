<?php

namespace Controllers;

use Services\IUserService;

class UserController {
    private $userService;

    public function __construct(IUserService $userService) {
        $this->userService = $userService;
    }

    public function listUsers() {
        $this->userService->getAll();
    }

}