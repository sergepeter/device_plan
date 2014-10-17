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
        <script src="js/jquery-2.1.1.js"></script>

        <link href="js/bootstrap/css/bootstrap.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 0px;
                padding-bottom: 0px;
            }
            .sidebar-nav {
                padding: 9px 0;
            }

            @media (max-width: 980px) {
                /* Enable use of floated navbar text */
                .navbar-text.pull-right {
                    float: none;
                    padding-left: 5px;
                    padding-right: 5px;
                }
            }
        </style>



    </head>

    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="#">Device Plan</a>
                    <div class="nav-collapse collapse">
                        <p class="navbar-text pull-right">
                            Source hosted on <a href="https://github.com/sergepeter/device_plan" target="_blank">Github</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <svg  width="1800"
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
