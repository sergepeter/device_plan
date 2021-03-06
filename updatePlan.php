<?php

include_once 'DevicePlan.php';
$db = new PDO('mysql:dbname=device_map;host=localhost', 'root', 'mysql');

if (isset($_POST["planId"])) {

    $planId = $_POST["planId"];

    $plan = FloorPlanModel::findById($db, $planId);

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

    $plan->updateToDatabase($db);

    echo "Success";
} else {
    echo "Error";
}