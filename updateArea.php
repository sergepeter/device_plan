<?php

include_once 'DevicePlan.php';
$db = new PDO('mysql:dbname=device_map;host=localhost', 'root', 'mysql');

if (isset($_POST["areaId"])) {

    $areaId = $_POST["areaId"];

    
    if ($areaId == 0) {
        $area = new AreaModel();
    } else {
      $area = AreaModel::findById($db, $areaId);
    }

    if (isset($_POST["title"])) {
        $area->setTitle($_POST["title"]);
    }
    if (isset($_POST["description"])) {
        $area->setDescription($_POST["description"]);
    }

    if (isset($_POST["planId"])) {
        $area->setPlanId($_POST["planId"]);
    }
    if (isset($_POST["path"])) {
        $area->setPath($_POST["path"]);
    }
    if (isset($_POST["status"])) {
        $area->setStatus($_POST["status"]);
    }

    if ($areaId == 0) {
        $area->insertIntoDatabase($db);
    } else {
        $area->updateToDatabase($db);
    }


    echo "Success";
} else {
    echo "Error";
}