<?php
function passURL($URL){
 $URI = str_replace ( "%26", "&", $URL);
 $URI = str_replace ( "%3F", "?", $URI);
 $URI = str_replace ( "%3D", "=", $URI);
 $URI = str_replace ( "%23", "#", $URI);
 return $URI;
}

function returnURL($URL){
 $URI = str_replace ( "&", "%26", $URL);
 $URI = str_replace ( "?", "%3F", $URI);
 $URI = str_replace ( "=", "%3D", $URI);
 $URI = str_replace ( "#", "%23", $URI);
 return $URI;
}

?>