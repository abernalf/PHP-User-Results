<?php   // src/create_user_admin.php

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../bootstrap.php';

use MiW\Results\Entity\User;

// Carga las variables de entorno
$dotenv = new \Dotenv\Dotenv(__DIR__ . '/..', \MiW\Results\Utils::getEnvFileName(__DIR__ . '/..'));
$dotenv->load();

$entityManager = getEntityManager();

$user = new User();
$user->setUsername($_ENV['ADMIN_USER_NAME']);
$user->setEmail($_ENV['ADMIN_USER_EMAIL']);
$user->setPassword($_ENV['ADMIN_USER_PASSWD']);
$user->setEnabled(true);
$user->setAdmin(true);

try {
    $entityManager->persist($user);
    $entityManager->flush();
} catch (Exception $exception) {
    echo $exception->getMessage();
}
