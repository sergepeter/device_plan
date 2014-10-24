<?php

include_once 'DevicePlan.php';
$db = new PDO('mysql:dbname=device_map;host=localhost', 'root', 'mysql');

if (isset($_POST["areaId"])) {

    $device = new DeviceModel();
    $device->setAreaId($_POST["areaId"]);
    $devices = DeviceModel::findByExample($db, $device);

    $list = array();

    foreach ($devices as $device) {
        $list[] = array('areaId' => $device->getAreaId(),
            'code' => $device->getCode(),
            'description' => $device->getDescription(),
            'deviceId' => $device->getDeviceId(),
            'planId' => $device->getPlanId(),
            'status' => $device->getStatus(),
            'type' => $device->getType(),
            'locationX' => $device->getLocationX(),
            'locationY' => $device->getLocationY(),
            'imageUrl' => $device->getImageUrl()
        );
    }

    echo json_encode($list);
}