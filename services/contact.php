<?php

include_once __DIR__ . "/select.php";
include_once __DIR__ . "/../sources/contact.php";

function contact_seeder($connection, $config): void
{
   $db = mysqli_query($connection, "SELECT COUNT(*) FROM contact_config");
   if ($db) {
      $count = mysqli_fetch_assoc($db)["count"];
      if ($count <= 0) {
         $page_title = $config["page_title"];
         $page_button_text = $config["page_button_text"];
         $section_title = $config["section_title"];
         $section_input_title = $config["section_input_title"];
         $map_latitude = $config["map_latitude"];
         $map_longitude = $config["map_longitude"];
         $map_place_name = $config["map_place_name"];
         $map_place_address = $config["map_place_address"];

         mysqli_query($connection, "INSERT INTO contact_config VALUES (NULL, '$page_title', '$page_button_text', '$section_title', '$section_input_title', '$map_latitude', '$map_longitude', '$map_place_name', '$map_place_address')");
      }
   }
}

contact_seeder($connection, $contact_config_data);
