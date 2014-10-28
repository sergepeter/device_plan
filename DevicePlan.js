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

    refreshAreas();
    refreshDevices();


    /*
     $.post("getDevices.php",
     {
     planId: 1
     },
     function (json, status) {
     $.each(json, function (idx, obj) {
     printDev("device" + obj.deviceId, obj.locationX, obj.locationY, obj.type, obj.status, "plan" + obj.planId);
     });
     }, "json");
     */
    $("#editPlanDiv").hide();
    $("#editAreaDiv").hide();
    $("#editDeviceDiv").hide();

}

/**
 * Refresh devices only
 * @returns {undefined}
 */
function refreshDevices() {


    $.ajax({
        type: 'POST',
        url: "getDevices.php",
        data: {planId: 1},
        success: function (json) {
            $.each(json, function (idx, obj) {
                $("#device" + obj.deviceId).remove( );
                $("#statusdevice" + obj.deviceId).remove( );
                printDev("device" + obj.deviceId, obj.locationX, obj.locationY, obj.type, obj.status, "plan" + obj.planId);
            });
        },
        dataType: "json",
        async: false
    });




    /*
     $.post("getDevices.php",
     {
     planId: 1
     },
     function (json, status) {
     $.each(json, function (idx, obj) {
     $("#device" + obj.deviceId).remove( );
     $("#statusdevice" + obj.deviceId).remove( );
     printDev("device" + obj.deviceId, obj.locationX, obj.locationY, obj.type, obj.status, "plan" + obj.planId);
     });
     }, "json");
     */
}

function refreshAreas() {

    $.ajax({
        type: 'POST',
        url: "getAreas.php",
        data: {planId: 1},
        success: function (json) {
            $.each(json, function (idx, obj) {
                $("#area" + obj.areaId).remove( );
                printArea("area" + obj.areaId, obj.path, obj.status, "plan" + obj.planId);
            });
        },
        dataType: "json",
        async: false
    });

    console.log("refresh areas");


    /*
     $.post("getAreas.php",
     {
     planId: 1
     },
     function (json, status) {
     $.each(json, function (idx, obj) {
     $("#area" + obj.areaId).remove( );
     printArea("area" + obj.areaId, obj.path, obj.status, "plan" + obj.planId);
     });
     }, "json");
     */
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

    var style = "fill:grey;fill-opacity:0.4";

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
        style = 'fill:orange;fill-opacity:0.3;stroke:grey';
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

    var device = document.getElementById("device");
    var deviceClone = device.cloneNode(true);

    deviceClone.setAttribute("style", "fill:blue;fill-opacity:1");
    deviceClone.setAttribute("x", x - 16);
    deviceClone.setAttribute("y", y - 16);
    deviceClone.setAttribute("id", code)

    if (type.toLocaleLowerCase() != 'printer' && type.toLocaleLowerCase() != 'rack') {
        type = 'other';
    }

    deviceClone.setAttribute("xlink:href", "ressources/" + type.toLocaleLowerCase() + ".png");

    var par = document.getElementById(parent);
    par.parentNode.appendChild(deviceClone);

    var statusComp = document.getElementById("status" + status);
    var statusClone = statusComp.cloneNode(true);

    statusClone.setAttribute("cx", x - 10);
    statusClone.setAttribute("cy", y - 10);
    statusClone.setAttribute("id", "status" + code);

    par.parentNode.appendChild(statusClone);

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
    }
}

/**
 * Stop move device, store position and area
 * @param {type} evt
 * @returns {undefined}
 */
function stopMoveDevice(evt) {
    if (deviceIsMoving) {

        updateDevicePos(movingDeviceId.split("device")[1], evt.clientX, evt.clientY, currentArea);

        // prepareEdit(evt.srcElement.getAttribute("id"));

        deviceIsMoving = false;
        movingDeviceId = null;
        currentArea = null;

        refreshAreas();
        refreshDevices();

    }
}

var currentArea = null;

/**
 * Move device 
 * @param {type} evt
 * @returns {undefined}
 */
function moveDevice(evt) {

    var line = document.getElementById("shortestPrinter");
    var text = document.getElementById("posText");
    if (movingDeviceId != null) {

        $("#shortestPrinter").hide();

        var mov = document.getElementById(movingDeviceId);
        mov.setAttribute("x", evt.clientX - 16);
        mov.setAttribute("y", evt.clientY - 16);

        var stat = document.getElementById("status" + movingDeviceId);
        stat.setAttribute("cx", evt.clientX - 10);
        stat.setAttribute("cy", evt.clientY - 10);
        deviceIsMoving = true;

        currentArea = evt.srcElement.getAttribute("id");



    } else {


        $("#shortestPrinter").show();

        line.setAttribute("x1", evt.clientX);
        line.setAttribute("y1", evt.clientY);


        area = evt.srcElement.getAttribute("id");
        
        
        areaId = area.split("area")[1];
        text.setAttribute("x", evt.clientX);
        text.setAttribute("y", evt.clientY);
        
        
        $.post('getShortestDevice.php',
                {
                    areaId: areaId,
                    x: evt.clientX,
                    y: evt.clientY
                },
        function (json, status) {
           
            line.setAttribute("x2", json.toX);
            line.setAttribute("y2", json.toY);
            text.innerHTML = json.deviceStr + " (Pos x : " + json.toX + " y : " + json.toY + ") in " + json.title;
            

        }, "json");



    }
}
var oriFill;

function  overArea(evt) {

    zoomAreaIdActive = true;
    zoomAreaId = evt.srcElement.getAttribute("id");

    //width="1835" height="1260"
    //evt.srcElement.setAttribute("transform","scale(1.005)" );
    oriFill = evt.srcElement.getAttribute("style");

    evt.srcElement.setAttribute("style", "fill-opacity:0.05;");
    //evt.srcElement.setAttribute("transform", "matrix(1.05,0,0,1.05,0,0) translate(-50,-15) ");


}

function  outArea(evt) {

    if (zoomAreaId != null) {

        //evt.srcElement.setAttribute("transform","scale(1)" );
        evt.srcElement.setAttribute("style", oriFill);

        zoomAreaIdActive = false;
        zoomAreaId = null;
    }
}

function resetAllDragOperation() {
    if (deviceIsMoving) {

        deviceIsMoving = false;
        movingDeviceId = null;
    }

    $("#editPlanDiv").hide();
    $("#editAreaDiv").hide();
    $("#editDeviceDiv").hide();
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
                planId: $("#updatePlanForm #planId").val(),
                title: $("#updatePlanForm #title").val(),
                description: $("#updatePlanForm #description").val(),
                width: $("#updatePlanForm #width").val(),
                height: $("#updatePlanForm #height").val(),
                planUrl: $("#updatePlanForm #planUrl").val(),
                svgUrl: $("#updatePlanForm #svgUrl").val()
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

    $.ajax({
        type: 'POST',
        url: "updateArea.php",
        data: {
            areaId: $("#updateAreaForm #areaId").val(),
            planId: $("#updateAreaForm #planId").val(),
            title: $("#updateAreaForm #title").val(),
            description: $("#updateAreaForm #description").val(),
            status: $("#updateAreaForm #status").val(),
            path: $("#updateAreaForm #path").val()
        },
        success: function (data) {
            if (data == 'Success') {
                console.log("Update of record is OK");
                $("#editAreaDiv").hide();

            } else {
                console.log("An error occurs : " + data);
            }
        },
        dataType: "text",
        async: false
    });

    /*
     $.post('updateArea.php',
     {
     areaId: $("#updateAreaForm #areaId").val(),
     planId: $("#updateAreaForm #planId").val(),
     title: $("#updateAreaForm #title").val(),
     description: $("#updateAreaForm #description").val(),
     status: $("#updateAreaForm #status").val(),
     path: $("#updateAreaForm #path").val()
     },
     function (data) {
     if (data == 'Success') {
     console.log("Update of record is OK");
     $("#editAreaDiv").hide();
     
     } else {
     console.log("An error occurs : " + data);
     }
     }, 'text');
     */
    refreshAreas();
    refreshDevices();


}


function updateDevice(deviceId, areaId, planId, code, description, status, type, locationX, locationY) {

    console.log(deviceId);

    $.ajax({
        type: 'POST',
        url: "updateDevice.php",
        data: {
            deviceId: deviceId,
            areaId: areaId,
            planId: planId,
            code: code,
            description: description,
            status: status,
            type: type,
            locationX: locationX,
            locationY: locationY
        },
        success: function (data) {
            if (data == 'Success') {
                console.log("Update of record is OK");

                $("#device" + deviceId).remove();
                $("#statusdevice" + deviceId).remove();
                printDev("device" + deviceId, locationX, locationY, type, status, "plan" + planId);
            } else {
                console.log("An error occurs : " + data);
            }
        },
        dataType: "text",
        async: false
    });

    refreshAreas();
    refreshDevices();

    /*
     $.post('updateDevice.php',
     {
     deviceId: deviceId,
     areaId: areaId,
     planId: planId,
     code: code,
     description: description,
     status: status,
     type: type,
     locationX: locationX,
     locationY: locationY
     },
     function (data) {
     if (data == 'Success') {
     console.log("Update of record is OK");
     
     
     
     
     $("#device" + deviceId).remove();
     $("#statusdevice" + deviceId).remove();
     printDev("device" + deviceId, locationX, locationY, type, status, "plan" + planId);
     } else {
     console.log("An error occurs : " + data);
     }
     }, 'text');
     */
}

function updateDevicePos(deviceId, locationX, locationY, parent) {

    $.ajax({
        type: 'POST',
        url: "updateDevice.php",
        data: {
            deviceId: deviceId,
            areaId: parent.split("area")[1],
            locationX: locationX,
            locationY: locationY
        },
        success: function (data) {
            if (data == 'Success') {
                console.log("Update of record is OK");
            } else {
                console.log("An error occurs : " + data);
            }
        },
        dataType: "text",
        async: false
    });

    /*
     
     $.post('updateDevice.php',
     {
     deviceId: deviceId,
     areaId: parent.split("area")[1],
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
     
     */
}

function updateDeviceForm() {

    data = updateDevice($("#editDeviceDiv #deviceId").val(),
            $("#editDeviceDiv #areaId").val(),
            $("#editDeviceDiv #planId").val(),
            $("#editDeviceDiv #code").val(),
            $("#editDeviceDiv #description").val(),
            $("#editDeviceDiv #status").val(),
            $("#editDeviceDiv #type").val(),
            $("#editDeviceDiv #locationX").val(),
            $("#editDeviceDiv #locationY").val());

    $("#editDeviceDiv").hide();






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

function areaDoubleClick(evt) {

    var area = evt.srcElement.getAttribute("id");
    var posX = evt.clientX;
    var posY = evt.clientY;
    var areaId = area.split("area")[1];

    $.post('createDevice.php',
            {
                areaId: areaId,
                planId: 1,
                code: "new device",
                description: "add description here",
                status: "OK",
                type: "Other",
                locationX: posX,
                locationY: posY
            },
    function (json, status) {
        printDev("device" + json.deviceId, json.locationX, json.locationY, json.type, json.status, area);
        // updatedDevForm("device" + json.deviceId, json.locationX, json.locationY, "printer", json.status, area);
        $("#editDeviceDiv").show();
        $('#editDeviceDiv #deviceId').val(json.deviceId);
        $('#editDeviceDiv #areaId').val(json.areaId);
        $('#editDeviceDiv #planId').val(json.planId);
        $('#editDeviceDiv #code').val(json.code);
        $('#editDeviceDiv #type').val(json.type);
        $('#editDeviceDiv #description').val(json.description);
        $('#editDeviceDiv #locationX').val(json.locationX);
        $('#editDeviceDiv #locationY').val(json.locationY);
        $('#editDeviceDiv #status').val(json.status);
        $('#editDeviceDiv #areaTitle').val(json.areaTitle);


    }, "json");
}

/**
 * Send edit data to the form
 * @param {type} evt
 * @returns {undefined}
 */
function editArea(evt) {

    if (evt.button == 2) {

        $("#editDeviceDiv").hide();
        $("#editPlanDiv").hide();
        $("#editAreaDiv").show();


        area = evt.srcElement.getAttribute("id");
        areaId = area.split("area")[1];

        $.post('getArea.php',
                {
                    areaId: areaId
                },
        function (json, status) {
            $("#editAreaDiv").show();
            $('#editAreaDiv #areaId').val(json.areaId);
            $('#editAreaDiv #planId').val(json.planId);
            $('#editAreaDiv #title').val(json.title);
            $('#editAreaDiv #description').val(json.description);
            $('#editAreaDiv #path').val(json.path);
            $('#editAreaDiv #status').val(json.status);
        }, "json");


        $.post('getAreaDevices.php',
                {
                    areaId: areaId
                },
        function (json, status) {
            var tmpStatus = "OK";
            $("#devicesListForm").html("");
            $.each(json, function (idx, obj) {

                if (obj.status == "OK") {
                    $("#devicesListForm").append('<a href="#" class="list-group-item list-group-item-success">' + obj.type + " : " + obj.code + ' (' + obj.status + ')</a>');
                } else if (obj.status == "KO") {
                    $('#editAreaDiv #status').val("KO");
                    $("#devicesListForm").append('<a href="#" class="list-group-item list-group-item-danger">' + obj.type + " : " + obj.code + ' (' + obj.status + ')</a>');
                } else {
                    if (tmpStatus == "OK") {
                        $('#editAreaDiv #status').val("IDLE");
                    }
                    $("#devicesListForm").append('<a href="#" class="list-group-item list-group-item-warning">' + obj.type + " : " + obj.code + ' (' + obj.status + ')</a>');
                }
            });
        }, "json");

    }
}


function cancelEditArea() {
    $("#editAreaDiv").hide();
}

function editDevice(evt) {
    if (evt.button == 2) {
        prepareEdit(evt.srcElement.getAttribute("id"));
    }
}

function prepareEdit(device) {
    $("#editPlanDiv").hide();
    $("#editAreaDiv").hide();

    $.post('getDevice.php',
            {
                deviceId: device.split("device")[1]
            },
    function (json, status) {

        $("#editDeviceDiv").show();
        $('#editDeviceDiv #deviceId').val(json.deviceId);
        $('#editDeviceDiv #areaId').val(json.areaId);
        $('#editDeviceDiv #planId').val(json.planId);
        $('#editDeviceDiv #code').val(json.code);
        $('#editDeviceDiv #type').val(json.type);
        $('#editDeviceDiv #description').val(json.description);
        $('#editDeviceDiv #locationX').val(json.locationX);
        $('#editDeviceDiv #locationY').val(json.locationY);
        $('#editDeviceDiv #status').val(json.status);
        $('#editDeviceDiv #areaTitle').val(json.areaTitle);


    }, "json");
}

function cancelEditDevice() {
    $("#editDeviceDiv").hide();
}