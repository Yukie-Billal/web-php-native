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

function select_by_id($mysqli , $query, $id) {
   $stmt = $mysqli->prepare($query . " WHERE id = ?");
   $stmt->bind_param("i", $id);
   $stmt->execute();
   $result = $stmt->get_result();
   $stmt->close();
   return $result->fetch_assoc();
}

// section get query
function get_app_config($mysqli) {
   return select_one($mysqli , "SELECT * FROM app_config");
}

function get_home_slides($mysqli) {
   return select_many($mysqli, "SELECT * FROM home_slider");
}

function get_home_feature($mysqli) {
   return select_many($mysqli, "SELECT * FROM home_feature");
}

function get_home_feature_by_id($mysqli, $id) {
   return select_by_id($mysqli, "SELECT * FROM home_feature", $id);
}

function get_home_about($mysqli) {
   return select_one($mysqli, "SELECT * FROM home_about");
}

function get_home_about_by_id($mysqli, $id) {
   return select_by_id($mysqli, "SELECT * FROM home_about", $id);
}

function get_home_about_items($mysqli) {
   return select_many($mysqli, "SELECT * FROM home_about_items");
}

function get_home_service_config($mysqli) {
   return select_one($mysqli, "SELECT * FROM home_service_config");
}

function get_home_service_items($mysqli) {
   return select_many($mysqli, "SELECT * FROM home_service_items");
}

function get_home_service_item_by_id($mysqli, $id) {
   return select_by_id($mysqli, "SELECT * FROM home_service_items", $id);
}

function get_visi($mysqli) {
   return select_one($mysqli, "SELECT * FROM home_visi");
}

function get_misi($mysqli) {
   return select_one($mysqli, "SELECT * FROM home_misi");
}

function get_misi_items($mysqli) {
   return select_many($mysqli, "SELECT * from home_misi_items");
}

function get_misi_item_by_id($mysqli, $id) {
   return select_by_id($mysqli, "SELECT * FROM home_misi_items", $id);
}

function get_product_config($mysqli) {
   return select_one($mysqli, "SELECT * FROM product_config");
}

function get_product_items($mysqli) {
   return select_many($mysqli, "SELECT * FROM product_items");
}

function get_product_item_by_id($mysqli, $id) {
   return select_by_id($mysqli, "SELECT * FROM product_items",  $id);
}

function get_product_performance($mysqli) {
   return select_one($mysqli, "SELECT * FROM product_performance");
}

function get_documentation_config($mysqli) {
   return select_one($mysqli, "SELECT * FROM documentation_config");
}

function get_documentation_items($mysqli) {
   return select_many($mysqli, "SELECT * FROM documentation_items");
}

function get_documentation_item_by_id($mysqli, $id) {
   return select_by_id($mysqli, "SELECT * FROM documentation_items", $id);
}

function get_contact_config($mysqli) {
   return select_one($mysqli, "SELECT * FROM contact_config");
}

// end section get query

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
   $stmt = $mysqli->prepare('UPDATE home_about SET about_title = ?, about_text_title = ?, about_text_paragraf_1 = ?, about_text_paragraf_2 = ?, about_image_path = ? WHERE id = ?');
   $stmt->bind_param('sssssi', $data['about_title'], $data['about_text_title'], $data['about_text_paragraf_1'], $data['about_text_paragraf_2'], $data['about_image_path'], $about_id);

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

function update_visi(mysqli $mysqli, $data) {
   $stmt = $mysqli->prepare('UPDATE home_visi SET visi_title = ?, visi = ? WHERE id = ?');
   $stmt->bind_param('ssi', $data['visi_title'], $data['visi'], $data['id']);
   $result = $stmt->execute();
   $stmt->close();
   return $result;
}

function update_misi(mysqli $mysqli, $data) {
   $stmt = $mysqli->prepare('UPDATE home_misi SET misi_title = ?, misi = ? WHERE id = ?');
   $stmt->bind_param('ssi', $data['misi_title'], $data['misi'], $data['id']);
   $result = $stmt->execute();
   $stmt->close();
   return $result;
}

function create_misi_item(mysqli $mysqli, $data) {
   $stmt = $mysqli->prepare('INSERT INTO home_misi_items (order_number, misi) VALUES (?, ?)');
   $stmt->bind_param('ss', $data['order_number'], $data['misi']);
   $result = $stmt->execute();
   $stmt->close();
   return $result;
}

function update_misi_item(mysqli $mysqli, $data) {
   $stmt = $mysqli->prepare('UPDATE home_misi_items SET order_number = ?, misi = ? WHERE id = ?');
   $stmt->bind_param('ssi', $data['order_number'], $data['misi'], $data['id']);
   $result = $stmt->execute();
   $stmt->close();
   return $result;
}

function delete_misi_item(mysqli $mysqli, $data) {
   $stmt = $mysqli->prepare('DELETE FROM home_misi_items WHERE id = ?');
   $stmt->bind_param('i', $data['id']);
   $result = $stmt->execute();
   $stmt->close();
   return $result;
}

function create_home_service_item($mysqli, $data) {
   $stmt = $mysqli->prepare('INSERT INTO home_service_items (title, description, icon_path) VALUES (?, ?, ?)');
   $stmt->bind_param('sss', $data['title'], $data['description'], $data['icon_path']);
   $result = $stmt->execute();
   $stmt->close();
   return $result;
}

function update_home_service_item($mysqli, $service_id, $data) {
   $stmt = $mysqli->prepare('UPDATE home_service_items SET title = ?, description = ?, icon_path = ? WHERE id = ?');
   $stmt->bind_param('ssss', $data['title'], $data['description'], $data['icon_path'], $service_id);
   $result = $stmt->execute();
   $stmt->close();
   
   return $result;
}

function delete_home_service_item($mysqli, $id) {
   $stmt = $mysqli->prepare('DELETE FROM home_service_items WHERE id = ?');
   $stmt->bind_param('i', $id);
   $result = $stmt->execute();
   $stmt->close();
   return $result;
}

function create_product_item($mysqli, $data) {
   $stmt = $mysqli->prepare('INSERT INTO product_items (title, description, img_path) VALUES (?, ?, ?)');
   $stmt->bind_param('sss', $data['title'], $data['description'], $data['img_path']);
   $result = $stmt->execute();
   $stmt->close();
   return $result;
}

function update_product_item($mysqli, $data) {
   $stmt = $mysqli->prepare('UPDATE product_items SET title = ?, description = ?, img_path = ? WHERE id = ?');
   $stmt->bind_param('sssi', $data['title'], $data['description'], $data['img_path'], $data['id']);
   $result = $stmt->execute();
   $stmt->close();
   return $result;
}

function delete_product_item($mysqli, $id) {
   $stmt = $mysqli->prepare('DELETE FROM product_items WHERE id = ?');
   $stmt->bind_param('i', $id);
   $result = $stmt->execute();
   $stmt->close();
   return $result;
}

function update_product_config($mysqli, $data) {
   $stmt = $mysqli->prepare('UPDATE product_config SET page_title = ?, page_button_text = ?, section_title = ?, section_description = ? WHERE id = ?');
   $stmt->bind_param('ssssi', $data['page_title'], $data['page_button_text'], $data['section_title'], $data['section_description'], $data['id']);
   $result = $stmt->execute();
   $stmt->close();
   return $result;
}

function create_doc_item($mysqli, $data) {
   $stmt = $mysqli->prepare('INSERT INTO documentation_items (title, description, img_path) VALUES (?, ?, ?)');
   $stmt->bind_param('sss', $data['title'], $data['description'], $data['img_path']);
   $result = $stmt->execute();
   $stmt->close();
   return $result;
}

function update_doc_item($mysqli, $data) {
   $stmt = $mysqli->prepare('UPDATE documentation_items SET title = ?, description = ?, img_path = ? WHERE id = ?');
   $stmt->bind_param('sssi', $data['title'], $data['description'], $data['img_path'], $data['id']);
   $result = $stmt->execute();
   $stmt->close();
   return $result;
}

function delete_doc_item($mysqli, $id) {
   $stmt = $mysqli->prepare('DELETE FROM documentation_items WHERE id = ?');
   $stmt->bind_param('i', $id);
   $result = $stmt->execute();
   $stmt->close();
   return $result;
}

function update_doc_config($mysqli, $data) {
   $stmt = $mysqli->prepare('UPDATE documentation_config SET page_title = ?, page_button_text = ?, section_title = ?, section_subtitle = ? WHERE id = ?');
   $stmt->bind_param('ssssi', $data['page_title'], $data['page_button_text'], $data['section_title'], $data['section_subtitle'], $data['id']);
   $result = $stmt->execute();
   $stmt->close();
   return $result;
}

function update_product_performance($mysqli, $data) {
   $stmt = $mysqli->prepare('UPDATE product_performance SET mortalitas = ?, body_weight = ?, fcr = ?, umur_panen = ?, index_performance = ? WHERE id = ?');
   $stmt->bind_param("sssssi", $data['mortalitas'], $data['body_weight'], $data['fcr'], $data['umur_panen'], $data['index_performance'], $data['id']);
   $result = $stmt->execute();
   $stmt->close();
   return $result;  
}

function update_contact_config($mysqli, $data) {
   $stmt = $mysqli->prepare('UPDATE contact_config SET page_title = ?, page_button_text = ?, section_title = ?, section_input_title = ?, map_latitude = ?, map_longitude = ?, map_place_name = ?, map_place_address = ? WHERE id = ?');
   $stmt->bind_param("ssssssssi", $data['page_title'], $data['page_button_text'], $data['section_title'], $data['section_input_title'], $data['map_latitude'], $data['map_longitude'], $data['map_place_name'], $data['map_place_address'], $data['id']);
   $result = $stmt->execute();
   $stmt->close();
   return $result;
}