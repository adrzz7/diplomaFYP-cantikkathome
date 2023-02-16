<?php
require 'vendor/autoload.php';

session_start();
  include '../connect.php';

  if(!isset($_SESSION["CUSTOMER_Username"]) ){
  //header("Location:MainPage.php");
}


$key = 'faf1c8b0-5294-437a-9c57-eb85f9057167';

$couriers = new AfterShip\Couriers($key);
$trackings = new AfterShip\Trackings($key);
$last_check_point = new AfterShip\LastCheckPoint($key);




 ?>
