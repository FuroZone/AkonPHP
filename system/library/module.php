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
    if(file_exists(FILE_ROOT.$this->AppDirectory."/".$route.".php")) {
      include_once FILE_ROOT.$this->AppDirectory."/".$route.".php";
      return true;
    }
    echo "View $route does not exist.";
    return false;
  }
}

namespace app;
class Module {
  // View resolver
  protected $View;
  
  public function __construct() {
    $this->View = new redefines\View("application", array("view"));
    $this->run();
  }
  
  public function title($t) {
    echo "<title>$t</title>";
  }
}
?>