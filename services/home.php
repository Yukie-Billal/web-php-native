<?php

include_once __DIR__ . "/select.php";
include_once __DIR__ . "/../sources/home.php";

// section feature
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
// endsection

function about_seeder($connection, $datas): void {
   $db_count = mysqli_query($connection, "SELECT COUNT(*) AS count FROM home_about");
   if ($db_count) {
      $count = $db_count->fetch_column();
      if ($count <= 0) {
         $about_title = $datas['about_title'];
         $about_text_title = $datas['about_text_title'];
         $about_text_paragraf_1 = $datas['about_text_paragraf_1'];
         $about_text_paragraf_2 = $datas['about_text_paragraf_2'];
         mysqli_query($connection, "INSERT INTO home_about VALUES (NULL, '$about_title', '$about_text_title', '$about_text_paragraf_1', '$about_text_paragraf_2')");
      } 
   }

   $db_count_item = mysqli_query($connection, "SELECT COUNT(*) AS count FROM home_about_items");
   if ($db_count_item) {
      $count = $db_count_item->fetch_column();
      if ($count <= 0) {
         foreach ($datas['about_body_list'] as $key => $data) {
            mysqli_query($connection, "INSERT INTO home_about_items VALUES (NULL, '$data')");
         }
      }
   }
}

about_seeder($connection, $about_datas);

function get_about($connection) {
   return select($connection, "SELECT * FROM home_about")->fetch_assoc();
}

function get_about_items($connection) {
   return select($connection, "SELECT * FROM home_about_items");
}

?>