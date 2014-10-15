<?php
    include_once 'DevicePlan.php';
    $db = new PDO('mysql:dbname=device_map;host=localhost', 'root', 'mysql');
    createDefaultData($db);
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Device Map</title>
<script src="DevicePlan.js"></script>
</head>

<body>

<?php printPlanById($db, 1);?>
<?php printDevices($db, 1);?>
    
    
</body>

</html>
