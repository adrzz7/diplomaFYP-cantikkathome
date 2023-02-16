<?php

include 'vendor/autoload.php';
$app_id = '1151462';
$app_key = '7c98d2d88d8aa1a10b30';
$app_secret = '92ddfe988252e10aa791';
$app_cluster = 'ap1';


$pusher = new Pusher\Pusher( $app_key, $app_secret, $app_id, array('cluster' => $app_cluster) );


$data['message']= array(
      'order_id'=>$orderid


)

$pusher->trigger( 'cantikkathome', 'neworder', 'hello world',$data );










?>
