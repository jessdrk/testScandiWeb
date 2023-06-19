<?php
header("Access-Control-Allow-Origin: *");


// $conn = $database->getConnection();
// $sql = "SELECT * FROM products";
// $result = $conn->query($sql);
// $data = array();
// while ($row = $result->fetch_assoc()) {
//     $data[] = $row;
// }
// $json = json_encode($data);
// header('Content-Type: application/json');
// echo $json;

include_once 'database.php';
include_once 'products.php';

if (isset($_GET['getAll'])) {
  $db = new UseDatabase();
  $products = $db->getAll();
  echo $products;
}

if (isset($_GET['addDVD'])) {
  // Extract the product data from the query string
  $sku = $_GET['sku'];
  $name = $_GET['name'];
  $price = $_GET['price'];

  // Create a new Product object based on the product type
  $size = $_GET['size'];
  $product = new Dvd($sku, $name, $price, $size);

  $db = new UseDatabase();
  $db->addDVD($product);
}

if (isset($_GET['addBook'])) {
  // Extract the product data from the query string
  $sku = $_GET['sku'];
  $name = $_GET['name'];
  $price = $_GET['price'];

  // Create a new Product object based on the product type
  $weight = $_GET['weight'];
  $product = new Book($sku, $name, $price, $weight);

  $db = new UseDatabase();
  $db->addBook($product);
}

if (isset($_GET['addFurniture'])) {
  // Extract the product data from the query string
  $sku = $_GET['sku'];
  $name = $_GET['name'];
  $price = $_GET['price'];

  // Create a new Product object based on the product type
  $dimensions = explode('x', $_GET['dimension']);
  $height = $dimensions[0];
  $width = $dimensions[1];
  $length = $dimensions[2];
  $product = new Furniture($sku, $name, $price, $height, $width, $length);

  $db = new UseDatabase();
  $db->addFurniture($product);
}

if (isset($_GET['deleteProduct'])) {
  $id = $_GET['id'];

  $db = new UseDatabase();
  $result = $db->deleteProduct($id);
  echo $result;
}
  //   case 'Book':
  //     $weight_kg = $_GET['weight_kg'];
  //     $product = new Book(null, $sku, $name, $price, $weight_kg);
  //     break;
  //   case 'Furniture':
  //     $height_cm = $_GET['height_cm'];
  //     $width_cm = $_GET['width_cm'];
  //     $length_cm = $_GET['length_cm'];
  //     $product = new Furniture(null, $sku, $name, $price, $height_cm, $width_cm, $length_cm);
  //     break;
  //   default:
  //     // Handle unrecognized product types here
  //     break;
  // }

  // Add the Product object to the database



?>