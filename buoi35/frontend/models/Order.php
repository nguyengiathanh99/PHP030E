<?php
require_once 'models/Model.php';
class Order extends Model {
  public $id;
  public $fullname;
  public $address;
  public $mobile;
  public $email;
  public $note;
  public $price_total;
  public $payment_status;
}