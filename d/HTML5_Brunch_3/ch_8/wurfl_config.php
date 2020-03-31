<?php
//enable error logging while in developement
ini_set('display_errors', 'on');
error_reporting(E_ALL);

//define(_FILE_, '/');
//$wurflDir = dirname(_FILE_) . '/wurfl-php-1.4.1/WURFL';
//$resourceDir = dirname(_FILE_) . '/wurfl-php-1.4.1/resources';

$wurflDir =  'wurfl-php-1.4.1/WURFL';
$resourcesDir =  'wurfl-php-1.4.1/resources';

require_once $wurflDir.'/Application.php';

$persistenceDir = $resourcesDir. '/storage/persistence';

$cacheDir = $resourcesDir . '/storage/cache'; 

// Create WURFL Configuration

$wurflConfig = new WURFL_Configuration_InMemoryConfig();

//set location of the wurfl file
//
// 
//error somewhere on below line
$wurflConfig->wurflFile($resourcesDir . '/wurfl.zip');
//$wurflConfig->wurflFile('/wurfl-php-1.4.1/resources/wurfl.zip');



//set the match mode for the API('performance' or 'accuracy')
$wurflConfig->matchMode('performance');


//setup WURFL Persistance
$wurflConfig->persistence('file', array('dir'=> $persistenceDir));


//setup Caching
$wurflConfig->cache('file', array('dir' => $cacheDir, 'expiration' => 36000));


//create a WURFL Manager Factory from the WURFL Configuration
$wurflManagerFactory = new WURFL_WURFLManagerFactory($wurflConfig);


//create a WURFL Mananger
/* @var $wurflManager WURFL_WURFLManager */
$wurflManager = $wurflManagerFactory->create();













?>