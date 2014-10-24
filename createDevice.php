<?php

include_once 'DevicePlan.php';
$db = new PDO('mysql:dbname=device_map;host=localhost', 'root', 'mysql');


$device = new DeviceModel();

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
if (isset($_POST["status"])) {
    $device->setStatus($_POST["status"]);
}
if (isset($_POST["planId"])) {
    $device->setPlanId($_POST["planId"]);
}
if (isset($_POST["areaId"])) {
    $device->setAreaId($_POST["areaId"]);
}
if (isset($_POST["type"])) {
    $device->setType($_POST["type"]);
}

$device->insertIntoDatabase($db);


echo json_encode(array('areaId' => $device->getAreaId(),
    'code' => $device->getCode(),
    'description' => $device->getDescription(),
    'deviceId' => $device->getDeviceId(),
    'planId' => $device->getPlanId(),
    'status' => $device->getStatus(),
    'type' => $device->getType(),
    'locationX' => $device->getLocationX(),
    'locationY' => $device->getLocationY(),
    'imageUrl' => $device->getImageUrl()
));
