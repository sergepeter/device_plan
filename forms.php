
<div id="editPlanDiv"  class="panel panel-primary">
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

            <button id="updatePlan" onclick="updateUpdatePlanForm()" class="btn btn-default">Update</button>
            <button onclick="cancelEditPlan()" type="reset" class="btn btn-default">Cancel</button>
            <div id="result"></div>
        </form>
    </div>
</div> 

<div id="editAreaDiv" class="panel panel-primary">
    <div class="panel-heading">Area informations</div>
    <div class="panel-body">
        <form  id="updateAreaForm" role="form">
            <input type="hidden" class="form-control" id="areaId" value="<?php echo $area->getAreaId(); ?>"</input>
            <input type="hidden" class="form-control" id="planId" value="<?php echo $area->getPlanId(); ?>"</input>
            <div class="form-group">
                <label for="title">Title: </label>
                <input type="text" class="form-control" id="title" value="<?php echo $area->getTitle(); ?>"</input>
            </div>
            <div class="form-group">
                <label for="text">Description:</label>
                <textarea class="form-control" rows="3" id="description"><?php echo $area->getDescription(); ?></textarea>
            </div>

            <select id="status" class="form-control">
                <option>OK</option>
                <option>KO</option>
                <option>IDLE</option>
            </select>
            <div class="form-group">
                <label for="path">Path: </label>
                <input type="text" class="form-control" id="path" value="<?php echo $area->getPath(); ?>"</input>
            </div>
            <button id="updateArea" onclick="updateAreaForm()" class="btn btn-default">Update</button>
            <button onclick="cancelEditArea();" type="reset" class="btn btn-default">Cancel</button>
        </form>
        <br/>
        <div id="devicesListForm" class="list-group">
         
        </div>
        
    </div>
</div> 

<div id="editDeviceDiv" class="panel panel-primary">
    <div class="panel-heading">Printer informations</div>
    <div class="panel-body">
        <form role="form">

            <input type="hidden" class="form-control" id="deviceId" value="<?php echo $device->getDeviceId(); ?>"</input>               
            <input type="hidden" class="form-control" id="areaId" value="<?php echo $device->getAreaId(); ?>"</input>               
            <input type="hidden" class="form-control" id="planId" value="<?php echo $device->getPlanId(); ?>"</input>               

            <div class="form-group">
                <label for="code">Code: </label>
                <input type="text" class="form-control" id="code" value="<?php echo $device->getCode(); ?>"</input>
            </div>
            <div class="form-group">
                <label for="description">Description: </label>
                <textarea class="form-control" rows="3" id="description"><?php echo $device->getDescription(); ?></textarea>
            </div>
            <div class="form-group">
                <label for="areaTitle">Area: </label>
                <input class="form-control" rows="3" id="areaTitle"></textarea>
            </div>
            <div class="form-group">
                <label for="status">Status: </label>

                <select id="status" class="form-control">
                    <option>OK</option>
                    <option>KO</option>
                    <option>IDLE</option>
                </select>


            </div>
            <div class="form-group">
                <label for="type">Type: </label>

                <select id="type" class="form-control">
                    <option>Printer</option>
                    <option>Rack</option>
                    <option>Other</option>
                </select>


            </div>
            <div class="form-group">
                <label for="locationX">Location X: </label>
                <input type="text" class="form-control" id="locationX" value="<?php echo $device->getLocationX(); ?>"</input>
            </div>
            <div class="form-group">
                <label for="locationY">Locaiton Y: </label>
                <input type="text" class="form-control" id="locationY" value="<?php echo $device->getLocationY(); ?>"</input>
            </div>

            <button id="saveUdate" onclick="updateDeviceForm()" class="btn btn-default">Update</button>
            <button onclick="cancelEditDevice()" type="reset" class="btn btn-default">Cancel</button>
        </form>
    </div>
</div> 

