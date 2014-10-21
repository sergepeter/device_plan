<?php

include_once 'DevicePlan.php';
$db = new PDO('mysql:dbname=device_map;host=localhost', 'root', 'mysql');

if (isset($_POST["planId"])) {
    $area = new AreaModel();
    $area->setPlanId($_POST["planId"]);
    $areas = AreaModel::findByExample($db, $area);

    $list = array();

    foreach ($areas as $area) {
        $list[] = array('areaId' => $area->getAreaId(), 
            'title' => $area->getTitle(),
            'description' => $area->getDescription(),
            'path' => $area->getPath(),
            'planId' => $area->getPlanId(),
            'status' => $area->getStatus());
    }

    echo json_encode($list);
}