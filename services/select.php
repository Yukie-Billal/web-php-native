<?php

include __DIR__ . "/../config/database.php";


$query = mysqli_query($connection, "SELECT * FROM settings");