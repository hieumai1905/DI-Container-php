<?php

namespace registrations;

use controllers\UserController;
use DIContainer;
use services\UserService;

require_once 'DIContainer.php';
require_once 'controllers/UserController.php';
require_once 'services/UserService.php';

class RegisterSingleton
{
    private static $container = null;
    private static $instance = null;

    private function __construct()
    {
    }

    public static function getInstance(): RegisterSingleton
    {
        if (self::$instance == null) {
            self::$instance = new RegisterSingleton();
        }
        return self::$instance;
    }

    public function getContainer(): DIContainer
    {
        if (self::$container == null) {
            self::$container = DIContainer::getInstance();
        }
        return self::$container;
    }

    public function register(): void
    {
        $container = $this->getContainer();

        $container->register('Services\IUserService', function () {
            return new UserService();
        });

        $container->register('UserController', function () use ($container) {
            return new UserController($container->resolve('Services\IUserService'));
        });
    }
}
