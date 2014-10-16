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
        <link rel="stylesheet" href="js/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="js/bootstrap/css/bootstrap-theme.min.css">
        <script src="js/bootstrap/js/bootstrap.min.js"></script>
        <script src="js/bootstrap/js/bootbox.min.js"></script>
      
    </head>

    <body>


        <svg
            width="1800"
            height="1260"
            id="svgplan"
            version="1.1"
            inkscape:version="0.48.5 r10040"
            sodipodi:docname="plan1.svg">
        <defs
            id="defs4" />

        <g
            id="layer1"
            >
        <image
            y="0"
            x="0"
            id="planimg1"
            xlink:href="ressources/plan1.png"
            height="1260"
            width="1835" 
            />

        <rect id="plan1" width="1835" height="1260" style="fill:blue;fill-opacity:0.1"  y="0"
              x="0" onclick="addDevice(evt, 'plan1')"  onmousemove="moveDevice(evt)" />


        <path 
            style="fill:grey;fill-opacity:0.5;stroke:#000000;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
            d="m 258.89232,206.1828 310.21459,3.42148 0,-22.80989 190.46263,0 2.28099,225.81797 -408.29714,55.88424 -94.66107,-1.14049 z"
            id="area1" 
            onmouseover="overArea(evt)" 
            onmouseout="outArea(evt)" 
            onmousemove="moveDevice(evt)"
            onclick="addDevice(evt, 'plan1')" 
            />
        <path
            style="fill:grey;fill-opacity:0.5;stroke:#000000;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
            d="m 765.27202,189.07537 69.57018,-1.14049 0,23.95039 184.7602,-1.14049 -1.1405,197.3056 -249.7684,1.14049 z"
            onmouseover="overArea(evt)" 
            onmouseout="outArea(evt)" 
            onmousemove="moveDevice(evt)"
            onclick="addDevice(evt, 'plan1')" 
            id="area2"
            />
        <path
            style="fill:grey;fill-opacity:0.5;stroke:#000000;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
            d="m 1029.8668,211.88527 106.066,0 1.1405,190.46263 -106.066,-1.14049 z"
            onmouseover="overArea(evt)" 
            onmouseout="outArea(evt)" 
            onmousemove="moveDevice(evt)"
            onclick="addDevice(evt, 'plan1')" 
            id="area9"
            />
        <path
            style="fill:grey;fill-opacity:0.5;stroke:#000000;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
            d="m 544.01602,471.91809 309.0741,3.42148 -1.1405,296.52865 -304.51211,0 z"
            onmouseover="overArea(evt)" 
            onmouseout="outArea(evt)" 
            onmousemove="moveDevice(evt)"
            onclick="addDevice(evt, 'plan1')" 
            id="area3"

            />
        <path
            style="fill:grey;fill-opacity:0.5;stroke:#000000;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
            d="m 263.4543,777.5707 587.35483,-2.28099 -4.56198,60.44622 -80.97513,0 0,223.53697 -193.88412,-2.281 -2.28099,-21.6694 -305.65261,-1.1405 z"
            onmouseover="overArea(evt)" 
            onmouseout="outArea(evt)" 
            onmousemove="moveDevice(evt)"
            onclick="addDevice(evt, 'plan1')" 
            id="area4"

            />
        <path
            style="fill:grey;fill-opacity:0.5;stroke:#000000;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
            d="m 767.55301,839.15742 198.44609,0 0,196.16508 -128.87591,1.1405 -1.1405,25.0909 -67.28919,-2.281 z"
            onmouseover="overArea(evt)" 
            onmouseout="outArea(evt)" 
            onmousemove="moveDevice(evt)"
            onclick="addDevice(evt, 'plan1')" 
            id="area5"

            />
        <path
            style="fill:grey;fill-opacity:0.5;stroke:#000000;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
            d="m 968.28009,836.87643 166.51221,0 2.281,98.08255 -71.8511,102.64452 -96.94211,-3.4215 z"
            onmouseover="overArea(evt)" 
            onmouseout="outArea(evt)" 
            onmousemove="moveDevice(evt)"
            onclick="addDevice(evt, 'plan1')" 
            id="area6"
            />
        <path
            style="fill:grey;fill-opacity:0.5;stroke:#000000;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
            d="m 330.74349,473.05858 210.99154,-31.93385 3.42149,334.16498 -212.13204,-1.1405 3.42149,-264.59479 z"
            onmouseover="overArea(evt)" 
            onmouseout="outArea(evt)" 
            onmousemove="moveDevice(evt)"
            onclick="addDevice(evt, 'plan1')" 
            id="area7" 
            />
        <path
            style="fill:grey;fill-opacity:0.5;stroke:#000000;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
            d="m 846.24715,408.05038 173.35525,1.14049 1.1405,86.67761 35.3553,-1.1405 1.1405,260.03282 -36.4958,0 -4.562,77.55365 -165.37177,5.70247 z"
            onmouseover="overArea(evt)" 
            onmouseout="outArea(evt)" 
            onmousemove="moveDevice(evt)"
            onclick="addDevice(evt, 'plan1')" 
            id="area8"
            />
            <!--rect id="device" width="32" height="32" oncontextmenu="return false;" onmousedown="startMoveDevice(evt)"  onmouseup="stopMoveDevice(evt)" style="fill:blue;fill-opacity:0" x="100" y="100"/-->
            
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

            
               
        <script>
            $(document).ready(function () {
               init();
            });
        </script>
    </body>

</html>
