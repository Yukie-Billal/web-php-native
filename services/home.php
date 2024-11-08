<?php

include_once __DIR__ . "/select.php";

function get_features($connection) {
   return select($connection, "SELECT * FROM home_feature");
}

?>