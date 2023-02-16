<?php
  require 'vendor/autoload.php';

  $options = array(
    'cluster' => 'ap1',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    '7c98d2d88d8aa1a10b30',
    '92ddfe988252e10aa791',
    '1151462',
    $options
  );


$orderid = "O725";
$data =$orderid ."<br/>New Order Just Arrived";
  $pusher->trigger('cantikkathome', 'neworder', $data );
?>
