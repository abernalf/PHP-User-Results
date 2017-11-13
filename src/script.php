<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(__DIR__ . '/..', \MiW\Results\Utils::getEnvFileName(__DIR__ . '/..'));
$dotenv->load();


require_once __DIR__ . '/../bootstrap.php';

require __DIR__ . '/Entity/Users.php';
require __DIR__ . '/Entity/Results.php';

$entityManager = getEntityManager();

if('--user'== $argv[1]){
    if('--help'==$argv[2]){
        echo "--add:";
        echo "\n";
        echo "php src/script.php --user --add <USERNAME> <EMAIL> <PASSWORD>";
        echo "\n";
        echo "\n";
        echo "--delete:";
        echo "\n";
        echo "php src/script.php --user --delete <ID>";
        echo "\n";
        echo "\n";
        echo "--update:";
        echo "\n";
        echo "php src/script.php --user --update <ID> --name <NAME> --email <EMAIL> --password <PASSWORD>";
        echo "\n";
        echo "En el caso de dejar para el update un campo igual al que ya estaba, pondremos como atributo asterisco "*"";

    }
    if('--all'==$argv[2]){
        $user = $entityManager->getRepository(Users::class)->findAll();
        foreach ($user as $users){
            echo "ID: ".$users->getId().
                " USERNAME: ".$users->getUsername().
                " ENABLED: ".$users->isEnabled().
                " PASSWORD: ".$users->getPassword().
                " TOKEN: ".$users->getToken();
            echo "\n";

        }
    }

    if('--add'==$argv[2]){
        $user = new Users($argv[3],$argv[4],$argv[5]);

        try{
            $entityManager->persist($user);
            $entityManager->flush();

        }catch (Exception $e){
            echo $exception->getMessage();
        }
    }
    elseif('--delete'==$argv[2]){

        $user = $entityManager->getRepository(Users::class)->findOneById($argv[3]);
        $entityManager->remove($user);
        $entityManager->flush();

    }
    elseif ('--update'==$argv[2]){
        $user = $entityManager->getRepository(Users::class)->findOneById($argv[3]);

        if ($argv[4] == '--name'){
            if($argv[5] != '*'){
                $user->setUsername($argv[5]);
            }
        }
        if($argv[6] == '--mail'){
            if($argv[7] != '*'){
                $user->setEmail($argv[7]);
            }
        }
        if($argv[8] == '--password'){
            if($argv[9] != '*'){
                $user->setPassword($argv[9]);
            }
        }

        $entityManager->merge($user);
        $entityManager->flush();

    }
}
elseif ('--results'== $argv[1]){

    if('--help'==$argv[2]){
        echo "--add:";
        echo "\n";
        echo "php src/script.php --results --add <USER ID> <RESUTS>";
        echo "\n";
        echo "\n";
        echo "--delete:";
        echo "\n";
        echo "php src/script.php --results --delete <ID>";
        echo "\n";
        echo "\n";
        echo "--update:";
        echo "\n";
        echo "php src/script.php --results --update <ID> --results <RESULTS>";
        echo "\n";
        echo "En el caso de dejar para el update un campo igual al que ya estaba, pondremos como atributo asterisco "*"";

    }
    if('--all'==$argv[2]){
        $result = $entityManager->getRepository(Results::class)->findAll();
        foreach ($result as $results){
            echo "ID: ".$results->getId().
                " USER NAME: ".$results->getUsers()->getUsername().
                " RESULT: ".$results->getResult();
            echo "\n";

        }
    }

    elseif('--add'==$argv[2]){
        $user = $entityManager->getRepository(Users::class)->findOneById($argv[3]);
        echo $user->getUsername();
        $result = new Results($argv[4],$user);

        try{
            $entityManager->persist($result);
            $entityManager->flush();

        }catch (Exception $e){
            echo $exception->getMessage();
        }
    }
    elseif('--delete'==$argv[2]){

        $result = $entityManager->getRepository(Results::class)->findOneById($argv[3]);
        $entityManager->remove($result);
        $entityManager->flush();

    }

    elseif ('--update'==$argv[2]){

        $results = $entityManager->getRepository(Results::class)->findOneById($argv[3]);
        if ($argv[4] == '--result'){
            if($argv[5] != '*'){
                $results->setResult($argv[5]);
            }
        }

        $entityManager->merge($results);
        $entityManager->flush();

    }

}
