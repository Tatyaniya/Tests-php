<?php

class Store {
  private $name;
  private $address;
  private $products;

  public function __construct($name, $address) {
    $this->name = $name;
    $this->address = $address;
    $this->products = [];
  }

  public function add_product($product) {
    $this->products[] = $product;
  }

  public function remove_product($product) {
    $index = array_search($product, $this->products);
    if ($index !== false) {
      unset($this->products[$index]);
    }
  }

  public function get_products() {
    return $this->products;
  }
}

$store = new Store("Shop", "Street, 123");

$store->add_product("Laptop");
$store->add_product("Smartphone");
$store->add_product("TV");

$store->remove_product("Smartphone");

$products = $store->get_products();

echo "Goods in the store:</br>";
foreach ($products as $product) {
  echo $product . "</br>";
}
