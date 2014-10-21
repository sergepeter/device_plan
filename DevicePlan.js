/**
 * Main javascript code for device plan application
 * @type @exp;evt@pro;srcElement@call;getAttribute
 */

var movingDeviceId;
var deviceIsMoving;
var deviceId = 1;
var zoomAreaId;
var zoomAreaIdActive = false;
var currentPlanId;


/**
 * Main page initialisation function
 * @returns {undefined}
 */
function init() {

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

    
     $.post("getDevices.php",
            {
                planId: 1
            },
    function (json, status) {
        $.each(json, function (idx, obj) {
             printDev("device" + obj.deviceId, obj.locationX, obj.logcationY, obj.code, obj.status,  "plan" + obj.planId);
        });
    }, "json");
    
    
    $("#editPlanDiv").hide();
    $("#editAreaDiv").hide();
    $("#editDeviceDiv").hide();

}


/**
 * Init plan svg  objects
 * @param {type} id
 * @param {type} width
 * @param {type} height
 * @param {type} x
 * @param {type} y
 * @param {type} imgURL
 * @returns {undefined}
 */
function initPlan(id, width, height, x, y, imgURL) {
    console.log("Init Plan");

    var style = "fill:grey;fill-opacity:0.1";

    var img = document.getElementById("planImage");

    img.setAttribute("x", x);
    img.setAttribute("y", y);
    img.setAttribute("id", "img" + id);
    img.setAttribute("xlink:href", imgURL);
    img.setAttribute("height", height);
    img.setAttribute("width", width);

    var planRect = document.getElementById("planRect");

    planRect.setAttribute("x", x);
    planRect.setAttribute("y", y);
    planRect.setAttribute("id", "plan" + id);
    planRect.setAttribute("style", style);
    planRect.setAttribute("height", height);
    planRect.setAttribute("width", width);

}

/**
 * Print a arean based on hidden example
 * @param {type} id
 * @param {type} d
 * @param {type} status
 * @param {type} parent
 * @returns {undefined}
 */
function printArea(id, d, status, parent) {

    console.log("Print area" + id);

    var style = "fill:grey;fill-opacity:0.3;stroke:grey";
    var area = document.getElementById("area");
    var areaClone = area.cloneNode(true);

    areaClone.setAttribute("id", id);
    areaClone.setAttribute("d", d);

    if (status == "OK") {
        style = 'fill:green;fill-opacity:0.3;stroke:grey';
    } else if (status == "KO") {
        style = 'fill:red;fill-opacity:0.3;stroke:grey';
    } else {
        style = 'fill:grey;fill-opacity:0.3;stroke:grey';
    }

    areaClone.setAttribute("style", style);

    var par = document.getElementById(parent);
    par.parentNode.appendChild(areaClone);

}


/**
 * Print a device on the screen
 * @param {type} code
 * @param {type} x
 * @param {type} y
 * @param {type} type
 * @param {type} status
 * @param {type} parent
 * @returns {undefined}
 */
function  printDev(code, x, y, type, status, parent) {

    console.log("Print device" + code);

    var device = document.getElementById("device");
    var deviceClone = device.cloneNode(true);

    deviceClone.setAttribute("style", "fill:blue;fill-opacity:1");
    deviceClone.setAttribute("x", x - 16);
    deviceClone.setAttribute("y", y - 16);
    deviceClone.setAttribute("id", code)

    if (status == "OK") {
        deviceClone.setAttribute("xlink:href", "ressources/" + type + "OK.png");
    } else if (status == "KO") {

        deviceClone.setAttribute("xlink:href", "ressources/" + type + "KO.png");

    } else {
        deviceClone.setAttribute("xlink:href", "ressources/" + type + ".png");
    }

    var par = document.getElementById(parent);
    par.parentNode.appendChild(deviceClone);



}



/**
 * Mouse funny stuff
 * @param {type} evt
 * @returns {undefined}
 */
function startMoveDevice(evt) {
    if (evt.button == 2) {
        editDevice(evt);
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

function moveDevice(evt) {
    if (movingDeviceId != null) {
        console.log("Moving  ..." + movingDeviceId);
        var mov = document.getElementById(movingDeviceId);
        mov.setAttribute("x", evt.clientX);
        mov.setAttribute("y", evt.clientY);
        deviceIsMoving = true;
    }
}
var oriFill;

function  overArea(evt) {

    zoomAreaIdActive = true;
    zoomAreaId = evt.srcElement.getAttribute("id");

    //width="1835" height="1260"
    //evt.srcElement.setAttribute("transform","scale(1.005)" );
    oriFill = evt.srcElement.getAttribute("style");

    evt.srcElement.setAttribute("style", "fill:grey;fill-opacity:0.3;stroke:grey");

    // console.log("Start highlight " + zoomAreaId);


}

function  outArea(evt) {

    if (zoomAreaId != null) {
        //  console.log("Stop moving " + zoomAreaId);
        //evt.srcElement.setAttribute("transform","scale(1)" );
        evt.srcElement.setAttribute("style", oriFill);

        zoomAreaIdActive = false;
        zoomAreaId = null;
    }
}

function resetAllDragOperation() {
    if (deviceIsMoving) {
        console.log("Stop moving " + movingDeviceId);
        deviceIsMoving = false;
        movingDeviceId = null;
    }
}

function updateUpdatePlan(planId, title, description, width, height, planUrl, svgUrl) {

    $.post('updatePlan.php',
            {
                planId: planId,
                title: title,
                description: description,
                width: width,
                height: height,
                planUrl: planUrl,
                svgUrl: svgUrl
            },
    function (data) {
        if (data == 'Success') {
            console.log("Update of record is OK");
        } else {
            console.log("An error occurs : " + data);
        }
    }, 'text');
}


function updateUpdatePlanForm() {

    $.post('updatePlan.php',
            {
                planId: $("#planId").val(),
                title: $("#title").val(),
                description: $("#description").val(),
                width: $("#width").val(),
                height: $("#height").val(),
                planUrl: $("#planUrl").val(),
                svgUrl: $("#svgUrl").val()
            },
    function (data) {
        if (data == 'Success') {
            console.log("Update of record is OK");
            $("#editPlanDiv").hide();
            location.reload();

        } else {
            console.log("An error occurs : " + data);
        }
    }, 'text');

}

function updateAreaForm() {

    $.post('updateArea.php',
            {
                areaId: $("#areaId").val(),
                planId: $("#planId").val(),
                title: $("#title").val(),
                description: $("#description").val(),
                status: $("#status").val(),
                path: $("#path").val()
            },
    function (data) {
        if (data == 'Success') {
            console.log("Update of record is OK");
            $("#editAreaDiv").hide();
        } else {
            console.log("An error occurs : " + data);
        }
    }, 'text');
}


function updateDevice(deviceId, areaId, planId, code, description, status, locationX, locationY) {
    $.post('updateDevice.php',
            {
                deviceId: deviceId,
                areaId: areaId,
                planId: planId,
                code: code,
                description: description,
                status: status,
                locationX: locationX,
                locationY: locationY
            },
    function (data) {
        if (data == 'Success') {
            console.log("Update of record is OK");

        } else {
            console.log("An error occurs : " + data);
        }
    }, 'text');
}

function updateDeviceForm() {
    data = updateDevice($("#deviceId").val(),
            $("#areaId").val(),
            $("#planId").val(),
            $("#code").val(),
            $("#description").val(),
            $("#status").val(),
            $("#locationX").val(),
            $("#locationY").val());
    if (data == 'Success') {
        $("#editDeviceDiv").hide();
    }
}

function editPlan(evt) {
    console.log(evt.button);
    if (evt.button == 2) {
        $("#editDeviceDiv").hide();
        $("#editAreaDiv").hide();
        $("#editPlanDiv").show();
        console.log("edit plan ");
    }
}

function cancelEditPlan() {
    $("#editPlanDiv").hide();
}

function editArea(evt) {
    console.log(evt.button);
    if (evt.button == 2) {
        $("#editDeviceDiv").hide();
        $("#editPlanDiv").hide();
        $("#editAreaDiv").show();
        console.log("edit area");
    } else {
        console.log("Open add dialog box");
        printDev("device_" + deviceId++, (evt.clientX), (evt.clientY), "printer", "STANDBY", "plan1");
    }
}

function cancelEditArea() {
    $("#editAreaDiv").hide();
}


function editDevice(evt) {
    if (evt.button == 2) {
        $("#editPlanDiv").hide();
        $("#editAreaDiv").hide();
        $("#editDeviceDiv").show();
        console.log("edit device");
    }
}

function cancelEditDevice() {
    $("#editDeviceDiv").hide();
}