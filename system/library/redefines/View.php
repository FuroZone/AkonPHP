<?php
namespace app\redefines;
use app\router\Resolver;
class View extends Resolver {
  public function __construct($appdir = "application") {
    parent::__construct($appdir, array("view"));
  }
  
  public function get($uri) {
    return $this->resolve($uri);
  }
  
  public function load($uri, $data = null, $full = true) {
    $route = $this->resolve($uri);
    if($route) {
      if(!is_null($data)) {
        foreach($data as $key => $val) {
          $$key = $val;
        }
      }
      include_once $route;
      return true;
    }
    echo "View $route does not exist.";
    return false;
  }
}
?>