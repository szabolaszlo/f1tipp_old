<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 2016. 12. 07.
 * Time: 20:03
 */

// Composer autoload
require_once 'vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Symfony\Component\Debug\Debug;

Debug::enable();

/**
 * @return EntityManager
 * @throws \Doctrine\ORM\ORMException
 */
function getEntityManager()
{
    $paths = array(__DIR__ . '/src/Entity');
    $isDevMode = true;
    // the connection configuration
    $dbParams = array(
        'host' => 'localhost',
        'driver' => 'pdo_mysql',
        'user' => ' ',
        'password' => ' ',
        'dbname' => ' ',
        'charset' => 'UTF8',
        'driverOptions' => array(
            1002 => 'SET NAMES utf8'
        )
    );
    $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
    $driver = new AnnotationDriver(new AnnotationReader(), $paths);
    $cache = new \Doctrine\Common\Cache\FilesystemCache('cache/doctrine');
    $config->setProxyDir(__DIR__ . '/cache/doctrine');
    $config->setHydrationCacheImpl($cache);
    $config->setMetadataCacheImpl($cache);
    $config->setQueryCacheImpl($cache);
    $config->setResultCacheImpl($cache);

    $config2 = new \Doctrine\ORM\Cache\RegionsConfiguration();
    $factory = new \Doctrine\ORM\Cache\DefaultCacheFactory($config2, $cache);

    // Enable second-level-cache
    $config->setSecondLevelCacheEnabled();

    // Cache factory
    $config->getSecondLevelCacheConfiguration()
        ->setCacheFactory($factory);

    AnnotationRegistry::registerLoader('class_exists');
    $config->setMetadataDriverImpl($driver);
    
    return EntityManager::create($dbParams, $config);
}

/**
 * @return Twig_Environment
 */
function getTwig()
{
    $loader = new Twig_Loader_Filesystem(__DIR__ . '/src/view');
    $twig = new Twig_Environment($loader, array(
        'cache' => __DIR__ . '/cache/twig',
    ));
    return $twig;
}
