<?php

include_once 'DevicePlan.php';
$db = new PDO('mysql:dbname=device_map;host=localhost', 'root', 'mysql');

if (isset($_POST["deviceId"])) {

    $deviceId = $_POST["deviceId"];

    $device = DeviceModel::findById($db, $deviceId);
    
    if (is_null($device->getAreaId())) {
        $area = new AreaModel();
        $area->setTitle("Area not assigned");
    } else {
        $area = AreaModel::findById($db,$device->getAreaId());
    }

    echo json_encode(array('areaId' => $device->getAreaId(),
        'code' => $device->getCode(),
        'description' => $device->getDescription(),
        'deviceId' => $device->getDeviceId(),
        'planId' => $device->getPlanId(),
        'status' => $device->getStatus(),
        'type' => $device->getType(),
        'locationX' => $device->getLocationX(),
        'locationY' => $device->getLocationY(),
        'imageUrl' => $device->getImageUrl(),
        'areaTitle' => $area->getTitle()
    ));
}
