<?php
include_once 'lib/Db2PhpEntityBase.class.php';
include_once 'lib/Db2PhpEntityModificationTracking.class.php';


include_once 'lib/DFCInterface.class.php';
include_once 'lib/DFCAggregate.class.php';
include_once 'lib/DFC.class.php';
include_once 'lib/DSC.class.php';

include_once 'AreaModel.class.php';
include_once 'FloorPlanModel.class.php';
include_once 'DeviceModel.class.php';

function printDevices($db, $plan_id){
    
  $plan=FloorPlanModel::findById($db, $plan_id);
  
  $example = new DeviceModel();
  $example->setPlanId($plan->getPlanId());
  $devices=  DeviceModel::findByExample($db, $example);
  
  foreach ($devices as $device) {
      
            echo $device->getDeviceId() . ':' . $device->getCode() . ':' . $device->getStatus() . "\n";
            
            
            
            
            
}
  
  
}


/**
 * Print plan
 * @param type $db
 * @param type $plan_id
 */
function printPlanById($db, $plan_id){
    
  $plan=FloorPlanModel::findById($db, $plan_id);

  // print img
    echo '<div style="background-image: url(' . $plan->getPlanUrl() . ');
        background-size: ' . $plan->getWidth() . 'px ' . $plan->getHeight() . 'px;
        height: ' . $plan->getHeight() . 'px; width: ' . $plan->getWidth() . 'px; 
        border: 1px solid black; padding: 0px 0px 0px 0px;  margin: 5px 5px 5px 5px;">
        <svg width="' . ($plan->getWidth() + 10) . '" height="' . ($plan->getHeight() + 10) . '">
        <rect id="plan' . $plan->getPlanId() . '" x="0" y="0" width="' . $plan->getWidth()
        . '" height="' . $plan->getHeight() . '" fill="grey" fill-opacity="0.1" />
        </svg></div>';

    // print svg
  
}


/**
 * Create test data (if db is empty
 * @param type $db
 * @return type
 */
function createDefaultData($db) {
    
    $plan=FloorPlanModel::findById($db, 1);
    
    if (! is_null($plan) && $plan->getPlanId() == 1){
        return;
    }

    $plan1 = new FloorPlanModel();
    $plan1->setCoordE(0);
    $plan1->setCoordN(0);
    $plan1->setDescription("Cheseaux plan de l'usine de fabrication");
    $plan1->setHeight(1000);
    $plan1->setPlanUrl("ressources/cheseauxPlan.png");
    $plan1->setTitle("Usine de Cheseaux, Rez");
    $plan1->setWidth(1200);
    $plan1->insertIntoDatabase($db);

    $plan_cheseaux_id = $plan1->getPlanId();

    echo ("<p>Plan insterted (id:" . $plan_cheseaux_id . ")</p>");

    $plan2 = new FloorPlanModel();
    $plan2->setCoordE(0);
    $plan2->setCoordN(0);
    $plan2->setDescription("Genève, bureau de vente");
    $plan2->setHeight(1000);
    $plan2->setPlanUrl("ressources/ventePlan.png");
    $plan2->setTitle("Bureau de vente, genève");
    $plan2->setWidth(1200);
    $plan2->insertIntoDatabase($db);

    $plan_geneve_id = $plan2->getPlanId();

    echo ("<p>Plan insterted (id:" . $plan_geneve_id . ")</p>");

    $area1 = new AreaModel();
    $area1->setName("Helpdesk");
    $area1->setPlanId($plan_cheseaux_id);
    $area1->setDescription($area);
    $area1->setDescription("Helpdesk et support informatique");
    $area1->insertIntoDatabase($db);

    $area_helpdesk_id = $area1->getAreaId();

    echo ("<p>Area insterted (id:" . $area_helpdesk_id . ")</p>");

    $area2 = new AreaModel();
    $area2->setName("Bureau");
    $area2->setPlanId($plan_cheseaux_id);
    $area2->setDescription($area);
    $area2->setDescription("Bureau Administration");
    $area2->insertIntoDatabase($db);

    $area_helpdesk_id = $area2->getAreaId();

    echo ("<p>Area insterted (id:" . $area_helpdesk_id . ")</p>");

    $area3 = new AreaModel();
    $area3->setName("Vente desk");
    $area3->setPlanId($plan_geneve_id);
    $area3->setDescription($area3);
    $area3->setDescription("Bureau de vente de  Genève");
    $area3->insertIntoDatabase($db);

    $vente_id = $area3->getAreaId();

    echo ("<p>Area insterted (id:" . $vente_id . ")</p>");
    
    $device1 = new DeviceModel();
    $device1->setAreaId($area_helpdesk_id);
    $device1->setCode("Printer A3 HP");    
    $device1->setDescription("Printer ... HP");
    $device1->setPlanId($plan_cheseaux_id);
    $device1->setStatus("OK");
    $device1->insertIntoDatabase($db);
    
    echo ("<p>Device insterted (id:" . $device1->getDeviceId() . ")</p>");
    

    $device2 = new DeviceModel();
    $device2->setAreaId($vente_id);
    $device2->setCode("Printer A3 HP");    
    $device2->setDescription("Printer ... HP");
    $device2->setPlanId($plan_geneve_id);
    $device2->setStatus("OK");
    $device2->insertIntoDatabase($db);
    
    echo ("<p>Device insterted (id:" . $device2->getDeviceId() . ")</p>");
}



