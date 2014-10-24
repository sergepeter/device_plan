<?php

include_once 'DevicePlan.php';
$db = new PDO('mysql:dbname=device_map;host=localhost', 'root', 'mysql');

if (isset($_POST["areaId"])) {

    $areaId = $_POST["areaId"];

    $area = AreaModel::findById($db, $areaId);

    echo json_encode(array('areaId' => $area->getAreaId(),
        'planId' => $area->getPlanId(),
        'title' => $area->getTitle(),
        'description' => $area->getDescription(),
        'status' => $area->getStatus(),
        'path' => $area->getPath(),
    ));
}
