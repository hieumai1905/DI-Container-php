<?php

use registrations\RegisterSingleton;

require_once 'controllers/UserController.php';
require_once 'services/UserService.php';
require_once 'registrations/RegisterSingleton.php';
//------------------------------------Đăng ký Singleton-----------------------------------------
$registerSingleton = RegisterSingleton::getInstance();
$registerSingleton->register();
//----------------------------------------------------------------------------------------------

//-----------------------------------Lấy ra DI Container---------------------------------------
$container = $registerSingleton->getContainer();

$userController = $container->resolve('UserController');
$userController->listUsers();