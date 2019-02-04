<?php
	session_start();
	session_destroy();
	header("Location:http://localhost/IS501-DEEZER-V1.1/conectarse.php");
?>