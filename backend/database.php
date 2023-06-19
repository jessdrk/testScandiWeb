<?php
class Database {
  private $host = 'mariadb';
  private $dbname = 'web';
  private $username = 'root';
  private $password = 'qwertyui';
  private $conn;

  public function getConnection() {
    $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
    return $this->conn;
  }
}

class UseDatabase{
  protected $database;
  
  public function __construct()
  {
      $this->database = new Database();
  }
  
  public function getAll()
  {
      $conn = $this->database->getConnection();
      
      $sql = "SELECT * FROM products";
      $result = $conn->query($sql);
      
      while ($row = $result->fetch_assoc()) {
          $data[] = $row;
      }
      $json = json_encode($data);
      return $json;
  }

  public function addDVD($product) {
    $conn = $this->database->getConnection();
    $sql = "INSERT INTO products (sku, name, price, product_attribute_type, product_attribute_value) VALUES ('" . $product->getSku() . "', '" . $product->getName() . "', " . $product->getPrice() . ", 'DVD', " . $product->getTypeSpecificAttribute() . ");";
    echo $sql;
    
    $result = $conn->query($sql);
    echo $result;
  }

  public function addBook($product) {
    $conn = $this->database->getConnection();
    $sql = "INSERT INTO products (sku, name, price, product_attribute_type, product_attribute_value) VALUES ('" . $product->getSku() . "', '" . $product->getName() . "', " . $product->getPrice() . ", 'Book', " . $product->getTypeSpecificAttribute() . ");";
    echo $sql;
    
    $result = $conn->query($sql);
    echo $result;
  }

  public function addFurniture($product) {
    $conn = $this->database->getConnection();
    $sql = "INSERT INTO products (sku, name, price, product_attribute_type, product_attribute_value) VALUES ('" . $product->getSku() . "', '" . $product->getName() . "', " . $product->getPrice() . ", 'Furniture', '" . $product->getTypeSpecificAttribute() . "');";
    echo $sql;
    
    $result = $conn->query($sql);
    echo $result;
  }

  public function deleteProduct($id) {
    $conn = $this->database->getConnection();
    $sql = "DELETE FROM products WHERE id = $id";
    echo $sql;

    $result = $conn->query($sql);
    if ($result === true) {
      return "Product deleted successfully";
    } else {
      return "Error deleting product: " . $conn->error;
    }
  }
}
?>