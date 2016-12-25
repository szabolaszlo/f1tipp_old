<?php
/**
 * @author Paráda József
 * @since 2015.04.30. 10:00
 */

use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once 'bootstrap.php';

$entityManager = getEntityManager();

$platform = $entityManager->getConnection()->getDatabasePlatform();
$platform->registerDoctrineTypeMapping('enum', 'string');

return ConsoleRunner::createHelperSet($entityManager);