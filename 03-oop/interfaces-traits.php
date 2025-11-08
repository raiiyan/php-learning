<?php
interface Logger {
  public function log($message);
}

trait FileLogger {
  public function log($message) {
    echo "Logging message: $message";
  }
}

class App {
  use FileLogger;
}

$app = new App();
$app->log("App started");
?>