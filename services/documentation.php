<?php

include_once __DIR__ . "/select.php";
include_once __DIR__ . "/../sources/documentation.php";

function documentation_seeder($connection, $config, $items): void
{
   $db = mysqli_query($connection, "SELECT COUNT(*) FROM documentation_config");
   if ($db) {
      $count = mysqli_fetch_assoc($db)["count"];
      if ($count <= 0) {
         $page_title = $config["page_title"];
         $page_button_text = $config["page_button_text"];
         $section_title = $config['section_title'];
         $section_subtitle = $config['section_subtitle'];
         mysqli_query($connection, "INSERT INTO documentation_config VALUES (NULL, '$page_title', '$page_button_text', '$section_title', '$section_subtitle')");
      }
   }
   $db_item = mysqli_query($connection, "SELECT COUNT(*) FROM documentation_items");
   if ($db_item) {
      $count = mysqli_fetch_assoc($db_item)["count"];
      if ($count <= 0) {
         foreach ($items as $key => $item) {
            $img = $item["img_path"];
            $title = $item["title"];
            $description = $item["description"];
            mysqli_query($connection, "INSERT INTO documentation_items VALUES (NULL, '$img', '$title', '$description')");
         }
      }
   }
}

documentation_seeder($connection, $documentation_config_data, $documentation_item_datas);
