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

    initPlan("plan1", 1835, 1260, 0, 0, "ressources/plan1.png");


    printArea("area1", "m 264.26618,212.37336 306.73753,0 -0.47191,-25.48281 190.17727,0.94381 0.94381,283.61424 -403.94973,0.94381 0,-5.19095 -93.90888,0 z", "OK", "plan1");
    printArea("area2", "m 767.31573,188.77817 67.01035,-0.47191 0.94381,24.53901 150.53734,0 1.41571,195.36821 -219.43531,-0.47191 z", "OK", "plan1");
    printArea("area4", "m 1030.6381,208.59813 105.7065,0.47191 0.9438,192.53678 -108.5379,-0.94381 z", "OK", "plan1");
    printArea("area5", "m 336.46747,776.77042 207.16581,-1.88762 0.94381,-302.9623 -212.35675,-2.35952 z", "OK", "plan1");
    printArea("area6", "m 567.22848,472.39241 264.73808,0.4719 0.4719,22.17948 17.93235,0 -0.94381,256.24382 -16.51663,0 -0.47191,18.87615 -264.73808,0 -1.41571,-19.81996 -18.87616,0.94381 0.47191,-257.65953 18.87615,0.94381 z", "OK", "plan1");
    printArea("area7", "m 264.73808,776.77042 494.55528,7.55046 c 0,0 3.30333,272.28852 1.41571,272.28852 -1.88761,0 -190.17727,0 -190.17727,0 l -0.4719,-23.1233 -305.79372,0.9438 z", "OK", "plan1");
    printArea("area8", "m 767.31573,839.06173 c 2.83142,0 197.72773,0.94381 197.72773,0.94381 l -1.41571,193.00866 -127.41406,0.4719 -0.4719,25.4828 -67.48226,-0.9438 z", "OK", "plan1");
    printArea("area9", "m 856.03366,411.5168 161.86304,1.41572 0.9438,419.99446 -161.86303,1.41571 z", "KO", "plan1");
    printArea("area10", "m 970.7063,840.00554 c 2.35952,0 164.6945,0.9438 164.6945,0.9438 l 2.3595,90.13365 -70.7856,103.34691 -93.90888,-0.4719 z", "KO", "plan1");

    printDev("printer1", 400, 400, "printer", "OK", "plan1");
    printDev("printer2", 800, 600, "printer", "KO", "plan1");
    printDev("rack1", 1000, 800, "rack", "OK", "plan1");
    printDev("rack2", 800, 1000, "rack", "STANBY", "plan1");

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
    planRect.setAttribute("id", id);
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
 * Add device and print it
 * @param {type} evt
 * @param {type} parent
 * @returns {undefined}
 */
function addDevice(evt) {
    console.log("Open add dialog box");
    printDev("device_" + deviceId++, (evt.clientX), (evt.clientY), "printer", "STANDBY", "plan1");
}

/**
 * Mouse funny stuff
 * @param {type} evt
 * @returns {undefined}
 */
function startMoveDevice(evt) {
    if (event.button == 2) {
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
        } else {
            console.log("An error occurs : "+ data);
        }
    }, 'text');

}

function updateAreaForm() {

    $.post('updateArea.php',
            {
                areaId: $("#areaId").val(),
                title: $("#title").val(),
                description: $("#description").val(),
                status: $("#status").val(),
                path: $("#path").val()
            },
    function (data) {
        if (data == 'Success') {
            console.log("Update of record is OK");
        } else {
            console.log("An error occurs : "+ data);
        }

    }, 'text');
}