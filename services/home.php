<?php

include_once __DIR__ . "/select.php";
include_once __DIR__ . "/../sources/home.php";

function feature_seeder($connection, $datas) : void {
   $feature_count = mysqli_query($connection, "SELECT COUNT(*) AS count FROM home_feature");
   if ($feature_count) {
      $count = $feature_count->fetch_column();
      if ($count <= 0) {
         foreach ($datas as $key => $data) {
            $title = $data['title'];
            $description = $data['description'];
            $icon_path = $data['icon_path'];
            mysqli_query($connection, "INSERT INTO home_feature (id, title, description, icon_path) VALUES (NULL, '$title', '$description', '$icon_path')");
         }
      }
   }
}

feature_seeder($connection, $feature_datas);

function get_features($connection) {
   return select($connection, "SELECT * FROM home_feature");
}

?>