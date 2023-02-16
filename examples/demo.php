<?php
require_once('..\vendor\autoload.php');


use \AfterShip\AfterShipException;

$key = '48cac374-8cfe-4c17-a6e8-cf6f3a6df18b';

$couriers = new AfterShip\Couriers($key);
$trackings = new AfterShip\Trackings($key);
$last_check_point = new AfterShip\LastCheckPoint($key);

$tracking_info = [
    'slug'    => 'jtexpress',
    'title'   => 'My Title',
];

$response = $trackings->create('RA123456789US', $tracking_info);
