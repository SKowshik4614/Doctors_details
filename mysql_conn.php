<?php

DEFINE ('DB_USER','root');
DEFINE ('DB_PASSWORD','Revenant.2092');
DEFINE ('DB_HOST','localhost');
DEFINE ('DB_NAME','santosh');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to db'.
		mysqli_connect_error();

?>
