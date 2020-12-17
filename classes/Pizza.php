<?php

class Pizza {

  private $flavor;
  private $ingredients;
  private $price;

  public function __construct($flavor, $ingredients, $price) {
    $this->flavor = $flavor;
    $this->ingredients = $ingredients;
    $this->price = $price;
  }

}