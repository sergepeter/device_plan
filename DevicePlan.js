var movingDeviceId;
var deviceIsMoving;
var deviceId = 1;
var zoomAreaId;
var zoomAreaIdActive = false;

function init() {
    
    printDev("printer1", 400, 400, "printer", "OK", "plan1");
    printDev("printer2", 800, 600, "printer", "KO", "plan1");
    printDev("rack1", 1000, 800, "rack", "OK", "plan1");
    printDev("rack2", 800, 1000, "rack", "STANBY", "plan1");
    
}


function  printDev(code, x, y, type, status, parent) {
    
    console.log("Insert Device" + code);

    var device = document.getElementById("device");
    var deviceClone = device.cloneNode(true);

    deviceClone.setAttribute("style", "fill:blue;fill-opacity:1");
    deviceClone.setAttribute("x", x - 16);
    deviceClone.setAttribute("y", y- 16);
    deviceClone.setAttribute("id", code)
    
    if (status == "OK") {
        deviceClone.setAttribute("xlink:href","ressources/" + type + "OK.png");
    } else if (status == "KO") {
        
         deviceClone.setAttribute("xlink:href","ressources/" + type + "KO.png");
        
    } else {
         deviceClone.setAttribute("xlink:href","ressources/" + type + ".png");
    }
    
    var par = document.getElementById(parent);
    par.parentNode.appendChild(deviceClone);
    
}

function addDevice(evt, parent) {

    console.log("Open add dialog box");
     printDev("device_" + deviceId++,  (evt.clientX),  (evt.clientY), "printer", "STANDBY", "plan1");
    
}

function startMoveDevice(evt) {
    if(event.button == 2) {
        modifyDevice(evt);   
    } else {
    //deviceIsMoving = true;
    movingDeviceId = evt.srcElement.getAttribute("id");
    console.log("Start moving " + movingDeviceId);
    }
}

function stopMoveDevice(evt) {
    
    if (deviceIsMoving) {
        console.log("Stop moving " + movingDeviceId);
        deviceIsMoving = false;
        movingDeviceId = null;
    }
}



function modifyDevice(evt) {
   if (!deviceIsMoving) {
       console.log("Modify device");
       
   }


}
    
function moveDevice(evt) {
   
    if ( movingDeviceId != null){
         console.log("Moving  ..." + movingDeviceId);
        var mov = document.getElementById(movingDeviceId);
        mov.setAttribute("x", evt.clientX);
        mov.setAttribute("y", evt.clientY);
        deviceIsMoving=true;
   
    }
    
}

function  overArea(evt) {
    zoomAreaIdActive = true;
    zoomAreaId = evt.srcElement.getAttribute("id");
    //width="1835" height="1260"
    //evt.srcElement.setAttribute("transform","scale(1.005)" );
    evt.srcElement.setAttribute("style","fill:grey;fill-opacity:0.8;stroke:#000000;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1" );
    
   // console.log("Start highlight " + zoomAreaId);
}

function  outArea(evt) {
    if (zoomAreaId != null) {
      //  console.log("Stop moving " + zoomAreaId);
        //evt.srcElement.setAttribute("transform","scale(1)" );
          evt.srcElement.setAttribute("style","fill:grey;fill-opacity:0.5;stroke:#000000;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1" );
   
        zoomAreaIdActive = false;
        zoomAreaId = null;
    }
}




