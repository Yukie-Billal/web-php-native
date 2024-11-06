<?php

include __DIR__ . "/../config/database.php";


function select ($query) {
	$query = mysqli_query($connection, $query);
}
