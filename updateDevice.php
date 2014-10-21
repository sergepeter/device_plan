<?php

include_once 'DevicePlan.php';
$db = new PDO('mysql:dbname=device_map;host=localhost', 'root', 'mysql');

if (isset($_POST["deviceId"])) {
    
    $deviceId = $_POST["deviceId"];
    
    if ($deviceId == 0) {
       $device = new DeviceModel();
    } else {
        $device = DeviceModel::findById($db, $deviceId);
    }
    
    if (isset($_POST["code"])) {
        $device->setCode($_POST["code"]);
    }
    if (isset($_POST["description"])) {
        $device->setDescription($_POST["description"]);
    }
    if (isset($_POST["locationX"])) {
        $device->setLocationX($_POST["locationX"]);
    }
    if (isset($_POST["locationY"])) {
        $device->setLocationY($_POST["locationY"]);
    }
    if (isset($_POST["planId"])) {
        $device->setPlanId($_POST["planId"]);
    }
    if (isset($_POST["areaId"])) {
        $device->setAreaId($_POST["areaId"]);
    }
    
     if ($deviceId == 0) {
        $device->insertIntoDatabase($db);

    } else {
        $device->updateToDatabase($db);

    }
   
    echo "Success";
} else {
    echo "Error";
}