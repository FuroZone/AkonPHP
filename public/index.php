<?php
// Uncomment if errors are needed
#error_reporting(E_ALL);
#ini_set('display_errors', true);

// Load configuration files
require_once dirname(__DIR__)."/config/general.php";
foreach($config_array as $value) {
  require_once CONFIG_ROOT.$value.".php";
}

// Include the system and application loaders
require_once SYSTEM_LIBRARY."loader.php";
require_once FILE_ROOT.$AppConfig['directory']."/library/loader.php";

$App = new app\Application($Routes, $AppConfig);

$App->Router->getPage();
if(!$App->Router->loadPage()) {
  echo "You shouldn't be here. Please contact the site owners with the following information:<br><hr>";
  echo "Error occurred while loading page $_SERVER[REQUEST_URI], var_dump:";
  var_dump($App);
}
?>
