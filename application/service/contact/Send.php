<?php
use app\Service;

class Send extends Service {
  private $ErrCodes;
  public function __construct() {
    parent::__construct();
    $this->Redirect = "/contact/submitted";
  }
  public function run() {
    $sender = $_POST['email'];
    if(!$sender) $this->error(1);
    $recipient = "contact+".$_POST['type']."@furozone.tech";
    $name = $_POST['name'];
    if(!$name) $this->error(2);
    $message = $_POST['message'];
    if(!$message) $this->error(3);

    $subject = "New Message from $name";
    $headers = "From: $sender";
    if(!mail($recipient, $subject, $message, $headers)) $this->error(4);
    $this->redirect();
  }
  
  private function error($err) {
    $this->Redirect = "/contact/error/$err";
    $this->redirect();
  }
  
  private function redirect() {
    $this->header("308 Permanent Redirect");
    $this->endService();
  }
}
?>