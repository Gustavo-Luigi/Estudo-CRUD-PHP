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


  /**
   * Get the value of flavor
   */ 
  public function getFlavor()
  {
    return $this->flavor;
  }

  /**
   * Set the value of flavor
   *
   * @return  self
   */ 
  public function setFlavor($flavor)
  {
    $this->flavor = $flavor;

    return $this;
  }

  /**
   * Get the value of ingredients
   */ 
  public function getIngredients()
  {
    return $this->ingredients;
  }

  /**
   * Set the value of ingredients
   *
   * @return  self
   */ 
  public function setIngredients($ingredients)
  {
    $this->ingredients = $ingredients;

    return $this;
  }

  /**
   * Get the value of price
   */ 
  public function getPrice()
  {
    return $this->price;
  }

  /**
   * Set the value of price
   *
   * @return  self
   */ 
  public function setPrice($price)
  {
    $this->price = $price;

    return $this;
  }
}