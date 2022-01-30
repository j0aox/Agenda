<?php

namespace JoaoAmador\Agenda\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    /**
     * @return EntityManagerInterface
     * @throws \Doctrine\ORM\ORMException
     */
    public function getEntityManager(): EntityManagerInterface
    {
        $isDevMode = true;
        $proxyDir = null;
        $cache = null;
        $useSimpleAnnotationReader = false;

        $rootDir = __DIR__ . '/../..';
        $config = Setup::createAnnotationMetadataConfiguration(
            [
                $rootDir . '/src'
            ],
            //true // modo Desenvolvimento
            //$isDevMode,
            //$proxyDir,
            //$cache,
            //$useSimpleAnnotationReader
        );
        $connection = [
            'driver' => 'pdo_mysql',
            'host' => 'localhost',
            'user' => 'root',
            'password' => '',
            'dbname' => 'contato',
            'path' => $rootDir . '/var/data/contato.sql'
        ];

        return EntityManager::create($connection, $config);
    }
}
