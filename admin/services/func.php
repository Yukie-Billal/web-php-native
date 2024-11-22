<?php

include __DIR__ . "/auth.php";


function select_many($mysqli , $query) {
   $result = mysqli_query($mysqli, $query);
   return $result;
}

function select_one($mysqli , $query) {
   $result = mysqli_query($mysqli, $query);
   return $result->fetch_assoc();
}

function get_app_config($mysqli) {
   return select_one($mysqli , "SELECT * FROM app_config");
}

function get_home_slides($mysqli) {
   return select_many($mysqli, "SELECT * FROM home_slider");
}

function get_home_feature($mysqli) {
   return select_one($mysqli, "SELECT * FROM home_feature");
}

function get_home_about($mysqli) {
   return select_one($mysqli, "SELECT * FROM home_about");
}

function get_home_about_items($mysqli) {
   return select_many($mysqli, "SELECT * FROM home_about_items");
}

function get_home_service_config($mysqli) {
   return select_one($mysqli, "SELECT * FROM home_service_config");
}

function get_home_service_items($mysqli) {
   return select_one($mysqli, "SELECT * FROM home_service_items");
}

function get_product_config($mysqli) {
   return select_one($mysqli, "SELECT * FROM product_config");
}

function get_product_items($mysqli) {
   return select_many($mysqli, "SELECT * FROM product_items");
}

function get_documentation_config($mysqli) {
   return select_one($mysqli, "SELECT * FROM documentation_config");
}

function get_documentation_items($mysqli) {
   return select_many($mysqli, "SELECT * FROM documentation_items");
}

function get_contact_config($mysqli) {
   return select_one($mysqli, "SELECT * FROM contact_config");
}

function insert_home_slide($mysqli, $data) {
   $stmt = $mysqli->prepare("INSERT INTO home_slider (img_path) VALUES (?)");
   $stmt->bind_param("s", $data["img_path"]);
   $result = $stmt->execute();
   $stmt->close();
   return $result;
}

function delete_home_slide($mysqli, $id) {
   $stmt = $mysqli->prepare("DELETE FROM home_slider WHERE id = ?");
   $stmt->bind_param("i", $id);
   $result = $stmt->execute();
   $stmt->close();
   return $result;
}

function update_home_feature($mysqli, $feature_id, $data)
{
   $stmt = $mysqli->prepare("UPDATE home_feature SET title = ?, description = ?, icon_path = ? WHERE id = ?");
   $stmt->bind_param("sssi", $data['title'], $data['description'], $data['icon_path'], $feature_id);

   $result = $stmt->execute();
   $stmt->close();
   if ($result) {
      return true;
   } else {
      return false;
   }
}

function update_home_about($mysqli, $about_id, $data)
{
   $stmt = $mysqli->prepare('UPDATE home_about SET about_title = ?, about_text_title = ?, about_text_paragraf_1 = ?, about_text_paragraf_1 = ?, about_image_path = ? WHERE id = ?');
   $stmt->bind_param('sssssi', $data['about_title'], $data['about_text_title'], $data['about_text_paragrah_1'], $data['about_text_paragrah_2'], $data['about_image_path'], $about_id);

   $result = $stmt->execute();
   $stmt->close();
   if ($result) {
      return true;
   } else {
      return false;
   }
}

function update_home_service_config(mysqli $mysqli, $service_id, $data) {
   $stmt = $mysqli->prepare('UPDATE home_service_config SET title = ?, subtitle = ? WHERE id = ?');
   $stmt->bind_param('ssi', $data['title'], $data['subtitle'], $service_id);

   $result = $stmt->execute();
   if ($result) {
      return true;
   } else {
      return false;
   }
}

function update_home_service_item($mysqli, $service_id, $data) {
   $stmt = $mysqli->prepare('UPDATE home_service_items SET title = ?, description = ?, icon_path = ? WHERE id = ?');
   $stmt->bind_param('sssi', $data['title'], $data['description'], $data['icon_path'], $service_id);
   $result = $stmt->execute();

   if ($result) {
      return true;
   } else {
      return false;
   }
}