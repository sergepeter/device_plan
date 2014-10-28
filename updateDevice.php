<?php

include_once 'DevicePlan.php';
$db = new PDO('mysql:dbname=device_map;host=localhost', 'root', 'mysql');

if (isset($_POST["deviceId"])) {

    $deviceId = $_POST["deviceId"];

    $device = DeviceModel::findById($db, $deviceId);

    if (isset($_POST["code"]) && !is_null($_POST["code"])) {
        $device->setCode($_POST["code"]);
    }
    if (isset($_POST["description"]) && !is_null($_POST["description"])) {
        $device->setDescription($_POST["description"]);
    }
    if (isset($_POST["locationX"]) && !is_null($_POST["locationX"])) {
        $device->setLocationX($_POST["locationX"]);
    }
    if (isset($_POST["locationY"]) && !is_null($_POST["locationY"])) {
        $device->setLocationY($_POST["locationY"]);
    }
    if (isset($_POST["planId"]) && !is_null($_POST["planId"])) {
        $device->setPlanId($_POST["planId"]);
    }
    if (isset($_POST["areaId"]) && !is_null($_POST["areaId"])) {
        $device->setAreaId($_POST["areaId"]);
    }
    if (isset($_POST["type"]) && !is_null($_POST["type"])) {
        $device->setType($_POST["type"]);
    }
    if (isset($_POST["status"]) && !is_null($_POST["status"])) {
        $device->setStatus($_POST["status"]);
    }
    $device->updateToDatabase($db);
    updateStatus($db);

    echo "Success";
} else {
    echo "Error";
}

function updateStatus($db) {


    $example = new AreaModel();
    $areas = AreaModel::findByExample($db, $example);

    foreach ($areas as $area) {

        $ex = new DeviceModel();
        $ex->setAreaId($area->getAreaId());
        $devs = DeviceModel::findByExample($db, $ex);
        $tmpStatus = "OK";
        foreach ($devs as $dev) {
            if ($dev->getStatus() == "KO") {
                $tmpStatus = "KO";
                break;
            } else if ($dev->getStatus() == "IDLE") {
                if ($tmpStatus != "KO") {
                    $tmpStatus = "IDLE";
                }
            }
        }
        $area->setStatus($tmpStatus);
        $area->updateToDatabase($db);
    }
}
