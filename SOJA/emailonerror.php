<?php
function customError($errno, $errstr) {
  echo "Caught Error=> ($errno) $errstr";
}

set_error_handler("customError");

echo($test);
echo "<br>";

trigger_error ("Data size too large", E_USER_ERROR);
echo "<br>";

trigger_error ("Data invalid");
?>
