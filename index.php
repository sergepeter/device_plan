<?php
include_once 'DevicePlan.php';
$db = new PDO('mysql:dbname=device_map;host=localhost', 'root', 'mysql');
createDefaultData($db);

$plan = FloorPlanModel::findById($db, 1);
$area = new AreaModel();
$device = new DeviceModel();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Device Map</title>
        <script src="DevicePlan.js"></script>
        <script src="js/jquery-2.1.1.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="bootstrap/js/bootstrap.js"></script>


        <style type="text/css">
            body {
                padding-top: 0px;
                padding-bottom: 0px;
            }
            .container {
                position: relative;
                width: 100%;
            }

            .right {
                position: absolute;
                right: 100px;
                width: 500px;
                top: 100px;
                padding: 20px;
            }
        </style>
    </head>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" onclick="editPlan()" href="#">Device Plan : <?php echo $plan->getTitle(); ?></a>

            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="https://github.com/sergepeter/device_plan">Sources hosted on Github</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
        <div class="right">  
            <?php require "forms.php"; ?>
        </div>

        <svg   width="1800"
               height="1260"
               id="svgplan"
               version="1.1">
        <defs id="defPlan" />

        <g id="planGroup">

        <image
            y="0"
            x="0"
            id="planImage"
            xlink:href=""
            height=""
            width=""
            style=""/>

        <rect id="planRect" 
              width="" 
              height="" 
              style="fill:grey;fill-opacity:0.5"  
              y="0"
              x="0" 
              oncontextmenu="editPlan(evt);return false;"
              onclick="editPlan(evt)"  
              onmousemove="moveDevice(evt)" />

        <path id="area" 
              style="fill:grey;fill-opacity:0.3;stroke:grey;z-index: 1; "
              d="m 1,1"
              oncontextmenu="editArea(evt);return false;"
              onclick="editArea(evt)" 
              ondblclick="areaDoubleClick(evt)"
              onmouseover="overArea(evt)"  
              onmouseout="outArea(evt)" 
              onmousemove="moveDevice(evt)"/>


        <image id="device" 
               width="32" 
               height="32" 
               style="z-index: 2;"
               oncontextmenu="return false;" 
               onmousedown="startMoveDevice(evt)"  
               onmouseup="stopMoveDevice(evt)" 
               onclick="editDevice(evt)"
               x="-100" 
               y="100" xlink:href="ressources/printer.png">     
        </image>


        <circle id="statusIDLE" fill= "orange" cx= "-125" cy= "-125" r= "6" stroke="black" style="z-index: 3;">
        <set id="show" attributeName="visibility" attributeType="CSS" to="visible"         	
             begin="0s; hide.end" dur= "0.5s" fill="freeze"/>
        <set id="hide" attributeName="visibility" attributeType="CSS" to="hidden"
             begin="show.end" dur= "0.5s" fill="freeze"/>
        </circle>

        <circle id="statusOK" fill= "green" cx= "-125" cy= "-125" r= "6" stroke="black" style="z-index: 3;">
        <set id="show" attributeName="visibility" attributeType="CSS" to="visible"         	
             begin="0s; hide.end" dur= "0.5s" fill="freeze"/>
        <set id="hide" attributeName="visibility" attributeType="CSS" to="hidden"
             begin="show.end" dur= "0.5s" fill="freeze"/>
        </circle>

        <circle id="statusKO" fill= "red" cx= "-125" cy= "-125" r= "6" stroke="black" style="z-index: 3;">
        <set id="show" attributeName="visibility" attributeType="CSS" to="visible"         	
             begin="0s; hide.end" dur= "0.5s" fill="freeze"/>
        <set id="hide" attributeName="visibility" attributeType="CSS" to="hidden"
             begin="show.end" dur= "0.5s" fill="freeze"/>
        </circle>

        </g>
        </svg>
    </div>


    <script>
        initPlan("1", 1835, 1260, 0, 0, "ressources/plan1.png");

        $.post("getAreas.php",
                {
                    planId: 1
                },
        function (json, status) {
            $.each(json, function (idx, obj) {
                printArea("area" + obj.areaId, obj.path, obj.status, "plan" + obj.planId);
            });
        }, "json");


        $(document).ready(function () {
            init();
        });
        $(document).keyup(function (e) {
            if (e.keyCode == 27) {
                resetAllDragOperation();
            }   // esc
        });
    </script>

</body>

</html>
