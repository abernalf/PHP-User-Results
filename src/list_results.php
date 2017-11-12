<?php   // src/list_results.php

require __DIR__ . '/../vendor/autoload.php';

// Carga las variables de entorno
$dotenv = new \Dotenv\Dotenv(__DIR__ . '/..', \MiW\Results\Utils::getEnvFileName(__DIR__ . '/..'));
$dotenv->load();

require_once __DIR__ . '/../bootstrap.php';

use MiW\Results\Entity\Result;

$entityManager = getEntityManager();

$resultsRepository = $entityManager->getRepository(Result::class);
$results = $resultsRepository->findAll();

if ($argc === 1) {
    echo PHP_EOL . sprintf('%3s - %5s - %20s - %s', 'Id', 'res', 'username', 'time') . PHP_EOL;
    $items = 0;
    /* @var Result $result */
    foreach ($results as $result) {
        echo $result . PHP_EOL;
        $items++;
    }
    echo PHP_EOL . "Total: $items results.";
} elseif (in_array('--json', $argv, true)) {
    echo json_encode($results, JSON_PRETTY_PRINT);
}
