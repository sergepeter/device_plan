<?php

include_once 'DevicePlan.php';
$db = new PDO('mysql:dbname=device_map;host=localhost', 'root', 'mysql');

if (isset($_POST["planId"])) {

    $plan_id = $_POST["planId"];

    if ($plan_id == 0) {
        $plan = new DeviceModel();
    } else {
        $plan = FloorPlanModel::findById($db, $plan_id);
    }
    if (isset($_POST["title"])) {
        $plan->setTitle($_POST["title"]);
    }
    if (isset($_POST["description"])) {
        $plan->setDescription($_POST["description"]);
    }
    if (isset($_POST["width"])) {
        $plan->setWidth($_POST["width"]);
    }
    if (isset($_POST["height"])) {
        $plan->setHeight($_POST["height"]);
    }
    if (isset($_POST["planUrl"])) {
        $plan->setPlanUrl($_POST["planUrl"]);
    }
    if (isset($_POST["svgUrl"])) {
        $plan->setPlanUrl($_POST["svgUrl"]);
    }

    if ($plan_id == 0) {
        $plan->insertIntoDatabase($db);
    }else{
        $plan->updateToDatabase($db);
    }
    

    echo "Success";
} else {
    echo "Error";
}