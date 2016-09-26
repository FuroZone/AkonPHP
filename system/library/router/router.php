<?php
namespace app\router;

class Router {
  // Array of routes to use
  private $Routes;
  
  // Classes
	private $Resolver;
	private $Utility;
  
  // 
  private $Page;
  private $AppDirectory;
    
  public function __construct($routearray, $appdir, $util) {
    $this->Routes = $routearray;
    $this->Resolver = new Resolver($appdir);
    $this->Utility = $util;
    $this->AppDirectory = $appdir;
  }
    
  public function getRoute($key) {
    $keys = array_keys($this->Routes);
    if($this->Utility->binarySearch($keys, $key)) {
      return $this->Routes[$key];
    }
    return FALSE;
  }
    
  public function setRoute($key,$value) {
    $this->Routes[$key] = $value;
  }
    
  public function saveRoutes($config) {
    
  }
	
  public function loadPage($route = null, $full = true) {
    if($route == null) {
      if($this->Page == null) {
        return false;
      }
      $route = $this->Page;
    }
    $class = preg_split("/[\/]/", $route);
    $class = preg_split("/[\.]/", $class[sizeof($class)-1])[0];
    if($full) {
      include_once $route;
    }else {
      include_once FILE_ROOT.$this->AppDirectory."/".$route.".php";
    }
    $classes = get_declared_classes();
    $class = $classes[sizeof($classes) - 1];
    $page = new $class();
    $page->run();
    return true;
  }
  
  /*
   * Getters for resolver information
   */
  public function getURL() {
    return "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  }
  
  public function getURI() {
    $query = strlen(strstr($_SERVER["REQUEST_URI"], "?", true));
    $length = $query == 0 ? strlen($_SERVER["REQUEST_URI"]) : $query;
    $uri = substr($_SERVER["REQUEST_URI"], 1, $length);
    return $uri == null ? "homepage" : substr($_SERVER["REQUEST_URI"], 1, $length);
  }
  
  public function getFullPath($appfile) {
    return FILE_ROOT.$this->AppDirectory."/".$appfile.".php";
  }
	
	/*
	 * WEB RESOLVER IMPLEMENTATION
	 */
	public function getPage($URI = null) {
		if($URI == null) {
      $URI = $this->getURI();
    }
    if(!$route = $this->getRoute($URI)) {
      if(!$route = $this->Resolver->resolve($URI)) {
        $route = $this->getFullPath($this->Routes["default"]);
      }
    }else $route = $this->getFullPath($route);
    $this->Page = $route;
    return $route;
	}
	 
	/*
	 * DATA RESOLVER IMPLEMENTATION
	 */
	public function getData($LNK = null) {
		if($LNK == null) {
      $LNK = $this->getURI();
    }
	}
}
?>
