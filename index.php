<?php 
if (preg_match('/(.*lol.*)/', $_SERVER["REQUEST_URI"])) {
	echo "lol";
}
else {
	echo "Hello world";
}
?>