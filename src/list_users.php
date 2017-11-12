<?php   // src/scripts/list_users.php

require __DIR__ . '/../vendor/autoload.php';

// Carga las variables de entorno
$dotenv = new \Dotenv\Dotenv(__DIR__ . '/..', \MiW\Results\Utils::getEnvFileName(__DIR__ . '/..'));
$dotenv->load();

require_once __DIR__ . '/../bootstrap.php';

use MiW\Results\Entity\Users;

$entityManager = getEntityManager();

$userRepository = $entityManager->getRepository(Users::class);
$users = $userRepository->findAll();

if (in_array('--json', $argv)) {
    echo json_encode($users, JSON_PRETTY_PRINT);
} else {
    $items = 0;
    echo PHP_EOL . sprintf("  %2s: %20s %30s %7s\n", 'Id', 'Username:', 'Email:', 'Enabled:');
    /** @var User $user */
    foreach ($users as $user) {
        echo sprintf(
            '- %2d: %20s %30s %7s',
            $user->getId(),
            $user->getUsername(),
            $user->getEmail(),
            ($user->isEnabled()) ? 'true' : 'false'
        ),
        PHP_EOL;
        $items++;
    }

    echo "\nTotal: $items users.\n\n";
}

