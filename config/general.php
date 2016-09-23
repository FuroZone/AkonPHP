<?php
/* General configuration file
 * Holds information on version, other configuration files, etc.
 */
 
 // Framework version.
 $pioverson = "0.1.0";
 
 // Framework file structure (Terrible means of doing this but I'm lazy)
define("FILE_ROOT",dirname(__DIR__)."/");
define("CONFIG_ROOT", FILE_ROOT . "config/");
define("SYSTEM_LIBRARY", FILE_ROOT . "system/library/");
define("SYSTEM_BIN", FILE_ROOT . "system/library/");
define("DATA_CSS", FILE_ROOT . "data/css/");
define("DATA_IMG", FILE_ROOT . "data/image/");
define("DATA_JS", FILE_ROOT . "data/js/");

// Configuration array, if new config files are added, add an entry here with
$config_array = array(
    "routes",
    "application"
);


?>
