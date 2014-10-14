<?php
include_once 'DevicePlanLib.php';

$db = new PDO('mysql:dbname=device_map;host=localhost', 'root', 'mysql');

createDefaultData($db);

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Device Map</title>
<script src="DevicePlanLib.js"></script>
</head>

<body>

<?php printPlanById($db, 1);?>
    
</body>

</html>
