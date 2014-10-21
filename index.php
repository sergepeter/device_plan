<?php
include_once 'DevicePlan.php';
$db = new PDO('mysql:dbname=device_map;host=localhost', 'root', 'mysql');
createDefaultData($db);
$plan = FloorPlanModel::findById($db, 1);
$area = AreaModel::findById($db, 1);
$device = DeviceModel::findById($db, 1);
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
                <a class="navbar-brand" href="#">Device Plan</a>
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
            
            <div class="panel panel-primary">

                <div class="panel-heading">Plan Info</div>
                <div class="panel-body">
                    <form id ="updatePlanForm" role="form">
                        <input type="hidden" class="form-control" id="planId" value="<?php echo $plan->getPlanId(); ?>"</input>
                        <div class="form-group">
                            <label for="title">Title: </label>
                            <input type="text" class="form-control" id="title" value="<?php echo $plan->getTitle(); ?>"</input>
                        </div>
                        <div class="form-group">
                            <label for="text">Description:</label>
                            <textarea class="form-control" rows="3" id="description"><?php echo $plan->getDescription(); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="width">Width:</label>
                            <input type="text" class="form-control" id="width" value="<?php echo $plan->getWidth(); ?>"></input>
                        </div>
                        <div class="form-group">
                            <label for="height">Height:</label>
                            <input type="text" class="form-control" id="height" value="<?php echo $plan->getHeight(); ?>"></input>
                        </div>
                        <div class="form-group">
                            <label for="planUrl">Plan URL:</label>
                            <input type="text" class="form-control" id="planUrl" value="<?php echo $plan->getPlanUrl(); ?>"></input>
                        </div>
                        <div class="form-group">
                            <label for="planUrl">SVG URL:</label>
                            <input type="text" class="form-control" id="svgPlan" value="<?php echo $plan->getSvgUrl(); ?>"></input>
                        </div>

                        <button id="updatePlan" class="btn btn-default">Update</button>
                        <button type="reset" class="btn btn-default">Cancel</button>

                        <div id="result"></div>
                    </form>
                </div>
            </div> 
            
            <div class="panel panel-primary">
                <div class="panel-heading">Area informations</div>
                <div class="panel-body">
                    <form  id="updateAreaForm" role="form">
                        <input type="hidden" class="form-control" id="areaId" value="<?php echo $area->getAreaId(); ?>"</input>
                        <div class="form-group">
                            <label for="title">Title: </label>
                            <input type="text" class="form-control" id="title" value="<?php echo $area->getTitle(); ?>"</input>
                        </div>
                        <div class="form-group">
                            <label for="text">Description:</label>
                            <textarea class="form-control" rows="3" id="description"><?php echo $area->getDescription(); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status: </label>
                            <input type="text" class="form-control" id="status" value="<?php echo $area->getStatus(); ?>"</input>
                        </div>
                        <div class="form-group">
                            <label for="path">Path: </label>
                            <input type="text" class="form-control" id="path" value="<?php echo $area->getPath(); ?>"</input>
                        </div>
                        <button id="updateArea" onclick="updateAreaForm()" class="btn btn-default">Update</button>
                        <button type="reset" class="btn btn-default">Cancel</button>
                    </form>
                </div>
            </div> 
            <div class="panel panel-primary">
                <div class="panel-heading">Printer informations</div>
                <div class="panel-body">
                    <form role="form">
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd">
                        </div>
                        <button class="btn btn-default">Update</button>
                        <button type="reset" class="btn btn-default">Cancel</button>
                    </form>
                </div>
            </div> 
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
            width=""/>

        <rect id="planRect" 
              width="" 
              height="" 
              style="fill:grey;fill-opacity:0.1"  
              y="0"
              x="0" 
              onclick="addDevice(evt)"  
              onmousemove="moveDevice(evt)" />


        <path id="area" 
              style="fill:grey;fill-opacity:0.3;stroke:grey"
              d="m 1,1"
              ondblclick="addDevice(evt)"
              onmouseover="overArea(evt)" 
              onmouseout="outArea(evt)" 
              onmousemove="moveDevice(evt)"
              </g>

        <image id="device" 
               width="32" 
               height="32" 
               oncontextmenu="return false;" 
               onmousedown="startMoveDevice(evt)"  
               onmouseup="stopMoveDevice(evt)" 
               x="-100" 
               y="-100" xlink:href="ressources/printerOK.png">     
        </image>

        </g>
        </svg>
    </div>




    <script>
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
