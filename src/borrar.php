<?php
/**
 * Created by PhpStorm.
 * User: chinegua
 * Date: 14/11/17
 * Time: 9:52
 */

require __DIR__ . '/../vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(__DIR__ . '/..', \MiW\Results\Utils::getEnvFileName(__DIR__ . '/..'));
$dotenv->load();


require_once __DIR__ . '/../bootstrap.php';

require __DIR__ . '/Entity/Users.php';
require __DIR__ . '/Entity/Results.php';


$id=($_GET['id']);
$entityManager = getEntityManager();
$user = $entityManager->getRepository(Users::class)->findOneById($id);
$entityManager->remove($user);
$entityManager->flush();

header("Location:showAll.php");
