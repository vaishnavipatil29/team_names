<?php

echo "entered";
$output = shell_exec("ls");

echo "<pre>$output<pre>";
$output = shell_exec("face_recognition --tolerance 0.54 ./known_persons ./unknown_persons | cut -d ',' -f2 ");
echo "<pre>$output<pre>";

?>
