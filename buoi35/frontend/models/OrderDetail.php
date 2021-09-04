<?php
require_once 'models/Model.php';
class OrderDetail extends Model {
  public $order_id;
  public $product_id;
  public $quantity;

}