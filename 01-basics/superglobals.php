<?php
// To test this, run on localhost and pass ?name=Raiyan in URL
if (isset($_GET['name'])) {
  echo "Hello, " . $_GET['name'];
}
?>