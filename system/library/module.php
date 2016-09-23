<?php
namespace app\redefines;
use app\router\Resolver;
class View extends Resolver {
  public function get($uri) {
    return $this->resolve($uri);
  }
  
  public function load($uri, $get = true) {
    if($get == true) {
      $route = $this->resolve($uri);
    }else{
      $route = $uri;
    }
    include_once FILE_ROOT.$this->AppDirectory."/".$route.".php";
    return true;
  }
}

namespace app;
class Module {
  // View resolver
  protected $View;
  
  private $AppDirectory;
  
  public function __construct() {
    $this->AppDirectory = "application";
    $this->View = new redefines\View($this->AppDirectory, array("view"));
    $this->run();
  }
  
  public function get($uri) {
    return $this->View->resolve($uri).".php";
  }
}
?>