<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(__DIR__ . '/..', \MiW\Results\Utils::getEnvFileName(__DIR__ . '/..'));
$dotenv->load();


require_once __DIR__ . '/../bootstrap.php';

require __DIR__ . '/Entity/Users.php';

$entityManager = getEntityManager();


$user = new Users("XXXX","a@gmail.com","aitor123");
try{
    $entityManager->persist($user);
    $entityManager->flush();

}catch (Exception $e){
    echo $exception->getMessage();
}