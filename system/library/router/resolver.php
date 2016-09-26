<?php
namespace app\router;
use app\Utility as Utility;

class Resolver {
  // Folders to check through
  protected $PageDir;
  
  // Application directory
  protected $AppDirectory;
  
  // Utility class
  private $Utility;
  
  public function __construct($ad, $pd = array("module", "service")) {
    $this->AppDirectory = $ad;
    $this->PageDir = $pd;
    $this->Utility = new Utility();
  }
  
  public function resolve($uri, $type = "php") {
    $parts = preg_split("/[\/]/", $uri);
    $current_page = false;
    foreach($this->PageDir as $dir) {
      $ret = $this->recurResolve($parts, $dir, $type, 0);
      if(gettype($ret) != "integer" && $ret) {
        $current_page = $ret;
      }elseif(gettype($ret) == "integer"){
        while($ret < sizeof($parts)) {
          if($ret++ == sizeof($parts)) {
            array_push($_GET, $parts[$ret]);
          }else{
            $_GET[$parts[$ret]] = $parts[$ret];
          }
          $ret += 2;
        }
      }
    }
    return $current_page;
  }
  
  private function recurResolve($uri, $dir, $type, $uri_id, $cur = null) {
    $pass = $this->fileCheck($uri[$uri_id], $dir, $type);
    if($pass[0] == "file") {
      return $pass[1];
    }elseif($pass[0] == "idir") {
      if(sizeof($uri) <= $uri_id + 1) {
        return $pass[1];
      }else{
        return $this->recurResolve($uri, $dir."/".$uri[$uri_id], $type, $uri_id + 1, $pass[1]);
      }
    }elseif($pass[0] == "udir") {
      if(sizeof($uri) <= $uri_id + 1) {
        return $cur;
      }else{
        return $this->recurResolve($uri, $dir."/".$uri[$uri_id], $type, $uri_id + 1, $uri_id);
      }
    }
    return $cur;
  }
    
  private function fileCheck($key, $base, $ftype) {
    $inc = $base."/".$key;
    $full = FILE_ROOT.$this->AppDirectory."/".$inc;
    $return = "";
    if($return = $this->Utility->pathExists($full)) {
      if($return = $this->Utility->pathExists($full."/index.".$ftype)) {
        return array("idir", $return);
      }else{
        return array("udir", $full);
      }
    }elseif($return = $this->Utility->pathExists($full.".".$ftype)) {
      return array("file", $return);
    }
    return false;
  }
}
?>
