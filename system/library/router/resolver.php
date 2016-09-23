<?php
namespace app\router;

class Resolver {
  // Folders to check through
  protected $PageDir;
  
  // Application directory
  protected $AppDirectory;
  
  public function __construct($ad, $pd = array("module", "service")) {
    $this->AppDirectory = $ad;
    $this->PageDir = $pd;
  }
  
  public function resolve($uri, $type = "php") {
    $parts = split("/", $uri);
    foreach($this->PageDir as $dir) {
      if($ret = $this->recurResolve($parts, $dir, $type, 0)) {
        return $ret;
      }
    }
    return false;
  }
  
  private function recurResolve($uri, $dir, $type, $uri_id) {
    $pass = $this->fileCheck($uri[$uri_id], $dir, $type);
    if($pass[0] == "file") {
      return $pass[1];
    }elseif($pass[0] == "idir") {
      if(sizeof($uri) <= $uri_id + 1) {
        return $pass[1];
      }else{
        return $this->recurResolve($uri, $dir."/".$uri[$uri_id], $uri_id + 1);
      }
    }elseif($pass[0] == "udir") {
        return $this->recurResolve($uri, $dir."/".$uri[$uri_id], $uri_id + 1);
    }elseif($uri_id)
    return false;
  }
    
  private function fileCheck($key, $base, $ftype) {
    $inc = $base."/".$key;
    $full = FILE_ROOT.$this->AppDirectory."/".$inc;
    if(is_dir($full)) {
      if(is_file($full.".".$ftype)) {
        return array("idir", $inc."/index");
      }else{
        return array("udir", $inc);
      }
    }elseif(is_file($full.".".$ftype)) {
      return array("file", $inc);
    }
    return false;
  }
}
?>
