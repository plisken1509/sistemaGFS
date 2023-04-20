<?php
	$db = new mysqli("localhost","root","","catering");
	if (mysqli_connect_errno()) {
		echo "No se puede conectar 🚫";
	}
?>