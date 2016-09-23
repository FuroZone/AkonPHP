<?php
namespace app;
use app\router\Router;
use app\Utility;

class Application {
  // Application classes
  public $Router;
  public $Utility;
  
  // Application info
  public $Name;
  public $Version;
  
  // Application directory
  private $Directory;
    
  public function __construct($Routes, $Config) {
    $this->Name = $Config['name'];
    $this->Version = $Config['version'];
    $this->Directory = $Config['directory'];
    $this->Utility = new Utility();
    $this->Router = new Router($Routes, $this->Directory, $this->Utility);
  }
  
  public function loadClass($Classname) {
    
  }
}
?>