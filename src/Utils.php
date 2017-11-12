<?php

namespace MiW\Results;

require_once __DIR__ . '/../bootstrap.php';

use Doctrine\ORM\Tools\SchemaTool;
use MiW\Results\Entity\Result;
use MiW\Results\Entity\User;

/**
 * Trait Utils
 *
 * @package MiW\Results
 */
trait Utils
{
    /**
     * Get .env filename (.env.docker || .env || .env.dist)
     *
     * @param string $dir      directory
     * @param string $filename filename
     *
     * @return string
     */
    public static function getEnvFileName(
        string $dir = __DIR__,
        string $filename = '.env'
    ): string {

        if (isset($_ENV['docker'])) {
            return $filename . '.docker';
        } elseif (file_exists($dir . '/' . $filename)) {
            return $filename;
        } else {
            return $filename . '.dist';
        }
    }

    /**
     * Load user data fixtures
     *
     * @param string $username user name
     * @param string $email    user email
     * @param string $password user password
     * @param bool   $isAdmin  isAdmin
     *
     * @return void
     */
    public static function loadUserData(string $username, string $email,
        string $password, bool $isAdmin = false) {
        $user = new User(
            $username,
            $email,
            $password,
            true,
            $isAdmin
        );
        $entityManager = getEntityManager();
        $entityManager->persist($user);
        $entityManager->flush();
    }

    /**
     * Update database schema
     *
     * @return void
     */
    public static function updateSchema()
    {
        $entityManager = getEntityManager();
        $schemaTool = new SchemaTool($entityManager);
        $schemaTool->dropDatabase();
        $classes = array(
            $entityManager->getClassMetadata(User::class),
            $entityManager->getClassMetadata(Result::class)
        );
        $schemaTool->updateSchema($classes, true);
    }
}
