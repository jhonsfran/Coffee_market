<?php

/**
 * Created by JetBrains PhpStorm.
 * User: alberto
 * Date: 17/11/11
 * Time: 06:07 PM
 * To change this template use File | Settings | File Templates.
 */
//use Doctrine\ORM\Tools\Setup;
//
////require_once "Doctrine/ORM/Tools/Setup.php";
////
////// (1) Load Classes
//$autoload = new Setup()->
// (2) ConfiguraciÃ³n
$config = new \Doctrine\ORM\Configuration();

// (3) CachÃ©, in production use APC
$cache = new \Doctrine\Common\Cache\ArrayCache();
$config->setMetadataCacheImpl($cache);
$config->setQueryCacheImpl($cache);

// (4) Driver select Driver [annotationsClasses,classes,xml, yml]
$driverType = "annotationsClasses";
$driverImpl = getDriver($driverType);

$config->setMetadataDriverImpl($driverImpl);

// (5) Proxies
$config->setProxyDir(__DIR__ . '/Proxies');
$config->setProxyNamespace('Proxies');

// (6) ConexiÃ³n
$connectionOptions = array(
    'driver' => 'pdo_pgsql',
    'host' => 'localhost',
    'port' => '5432',
    'user' => 'postgres',
    'password' => '1234',
    'dbname' => 'coffee_market',
    'charset' => 'utf8',
    'mapping_types' => array('enum' => 'string')  //ojo aqui
);

// (7) EntityManager
$em = \Doctrine\ORM\EntityManager::create($connectionOptions, $config);

// (8) HelperSet
$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
        ));


// Load Metadata
$em->getConfiguration()->setMetadataDriverImpl(
        new Doctrine\ORM\Mapping\Driver\DatabaseDriver($em->getConnection()->getSchemaManager())
);

$cmf = new Doctrine\ORM\Tools\DisconnectedClassMetadataFactory();
$cmf->setEntityManager($em);
$metadata = $cmf->getAllMetadata();

$cme = new Doctrine\ORM\Tools\Export\ClassMetadataExporter();

//Create mapping metadata
if ($driverType == "xml" || $driverType == "yml") {
    $exporter = $cme->getExporter($driverType, __DIR__ . "/config/" . $driverType);
    $exporter->setMetadata($metadata);
    $exporter->export();
    echo "make config files: " . $driverType;
}

// Create Objects
makeEntities($cme, $metadata, $driverType);

function makeEntities($cme, $metadata, $driverType) {

    echo "make entities...";
    // Generate Entities

    $exporter = $cme->getExporter('annotation', 'config/ann');
    $generator = new Doctrine\ORM\Tools\EntityGenerator();
    $generator->setUpdateEntityIfExists(true); // only update if class already exists
    $generator->setGenerateStubMethods(true);
    if ($driverType == "annotationsClasses") {
        $generator->setGenerateAnnotations(true);
    } else {
        $generator->setGenerateAnnotations(false);
    }
    $result = $generator->generate($metadata, __DIR__ . "/Entity");

    echo "done...";
}

function getDriver($variable) {

    $driverImpl = null;

    if ($variable == "annotationsClasses" || $variable == "classes") {
        $driverImpl = new Doctrine\ORM\Mapping\Driver\AnnotationDriver(array(__DIR__ . "/Entity"));
    } else if ($variable == "xml") {
        $driverImpl = new Doctrine\ORM\Mapping\Driver\XmlDriver(__DIR__ . "/config/xml/");
    } else if ($variable == "yml") {
        $driverImpl = new Doctrine\ORM\Mapping\Driver\YamlDriver(__DIR__ . "/config/yml/");
    } else {
        echo "Select one Driver...";
        exit;
    }
    return $driverImpl;
}
