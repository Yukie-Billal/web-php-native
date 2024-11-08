<?php

function select($connection, $query) {
	return mysqli_query($connection, $query);
}
