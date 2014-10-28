<?php

include_once 'DevicePlan.php';
$db = new PDO('mysql:dbname=device_map;host=localhost', 'root', 'mysql');

if (isset($_POST["areaId"])) {

    $areaId = $_POST["areaId"];
    $x = $_POST["x"];
    $y = $_POST["y"];

    $area = AreaModel::findById($db, $areaId);

    $example = new DeviceModel();

    $example->setAreaId($area->getAreaId());

    $devices = DeviceModel::findByExample($db, $example);

    $distance = 0;
    $device = new DeviceModel();

    foreach ($devices as $dev) {

        $devX = $dev->getLocationX();
        $devY = $dev->getLocationY();

        $newDistance =  sqrt(sqr($devY - $y) + sqr($devX - $x));

        if ($distance == 0) {
            $distance = $newDistance;
            $device = $dev;
        } else {
            if ($newDistance < $distance) {
                $device = $dev;
                $distance = $newDistance;
            }
        }
    }


    echo json_encode(array(
        'title' => $area->getTitle(),
        'toX' => $device->getLocationX(),
        'toY' => $device->getLocationY(),
        'deviceStr' => $device->getCode() . " : " . $device->getType()
    ));
}


function sqr($a) { 
   return $a*$a; 
} 