<?php

include_once 'lib/Db2PhpEntityBase.class.php';
include_once 'lib/Db2PhpEntityModificationTracking.class.php';

include_once 'AreaModel.class.php';
include_once 'FloorPlanModel.class.php';
include_once 'DeviceModel.class.php';
include_once 'PopulateData.php';


$db = new PDO('mysql:dbname=device_map;host=localhost', 'root', 'mysql');


createDefaultData($db);


