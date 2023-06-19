<?php
abstract class Product {
  protected $sku;
  protected $name;
  protected $price;

  public function __construct($sku, $name, $price) {
    $this->sku = $sku;
    $this->name = $name;
    $this->price = $price;
  }

  public function getSku() {
    return $this->sku;
  }

  public function getName() {
    return $this->name;
  }

  public function getPrice() {
    return $this->price;
  }

  abstract public function getTypeSpecificAttribute();
}

class Dvd extends Product {
  private $size;

  public function __construct($sku, $name, $price, $size) {
    parent::__construct($sku, $name, $price);
    $this->size = $size;
  }

  public function getTypeSpecificAttribute() {
    return $this->size;
  }
}

class Book extends Product {
  private $weight;

  public function __construct($sku, $name, $price, $weight) {
    parent::__construct($sku, $name, $price);
    $this->weight = $weight;
  }

  public function getTypeSpecificAttribute() {
    return $this->weight;
  }
}

class Furniture extends Product {
  private $height;
  private $width;
  private $length;

  public function __construct($sku, $name, $price, $height, $width, $length) {
    parent::__construct($sku, $name, $price);
    $this->height = $height;
    $this->width = $width;
    $this->length = $length;
  }

  public function getTypeSpecificAttribute() {
    return $this->height . 'x' . $this->width . 'x' . $this->length;
  }
}
?>
