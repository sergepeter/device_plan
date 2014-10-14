<?php
include_once 'DeviceMapLib.php';

$db = new PDO('mysql:dbname=device_map;host=localhost', 'root', 'mysql');

createDefaultData($db);

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Device Map</title>
<script src="DeviceMapLib.js"></script>
</head>

<body>

<?php printPlanById($db, 1);?>
    
</body>

</html>
