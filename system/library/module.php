<?php
namespace app;
abstract class Module {
  // View resolver
  protected $View;
  
  public function __construct() {
    $this->View = new redefines\View();
  }
  
  public function title($t) {
    echo "<title>$t</title>";
  }
  
  public function header($status = "200 OK") {
    header("HTTP/1.1 $status");
  }
  
  public abstract function run();
}
?>