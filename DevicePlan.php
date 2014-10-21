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

/**
 * Create test data (if db is empty
 * @param type $db
 * @return type
 */
function createDefaultData($db) {

    $plan = FloorPlanModel::findById($db, 1);

    if (!is_null($plan) && $plan->getPlanId() == 1) {
        
          return;
    }

        $plan1 = new FloorPlanModel();
        $plan1->setPlanId(1);
        $plan1->setCoordE(0);
        $plan1->setCoordN(0);
        $plan1->setDescription("The main floor plan description..");
        $plan1->setHeight(1260);
        $plan1->setPlanUrl("ressources/plan1.png");
        $plan1->setTitle("Main floor plan");
        $plan1->setWidth(1835);
        $plan1->insertIntoDatabase($db);

        $plan_cheseaux_id = $plan1->getPlanId();

        echo ("<p>Plan insterted (id:" . $plan_cheseaux_id . ")</p>");
  


  
        $area = new AreaModel();
        $area->setTitle("Bureau No1");
        $area->setPath("m 264.26618,212.37336 306.73753,0 -0.47191,-25.48281 190.17727,0.94381 0.94381,283.61424 -403.94973,0.94381 0,-5.19095 -93.90888,0 z");
        $area->setStatus("OK");
        $area->setPlanId(1);
        $area->setDescription("Bureau");
        $area->insertIntoDatabase($db);
       
   
        $area = new AreaModel();
        $area->setTitle("Bureau No2");
        $area->setPath("m 767.31573,188.77817 67.01035,-0.47191 0.94381,24.53901 150.53734,0 1.41571,195.36821 -219.43531,-0.47191 z");
        $area->setStatus("OK");
        $area->setPlanId(1);
        $area->setDescription("Bureau");
        $area->insertIntoDatabase($db);
   
        $area = new AreaModel();
        $area->setTitle("Open space");
        $area->setPath("m 1030.6381,208.59813 105.7065,0.47191 0.9438,192.53678 -108.5379,-0.94381 z");
        $area->setStatus("OK");
        $area->setPlanId(1);
        $area->setDescription("Space");
        $area->insertIntoDatabase($db);
   
        $area = new AreaModel();
        $area->setTitle("Bureau No3");
        $area->setPath("m 336.46747,776.77042 207.16581,-1.88762 0.94381,-302.9623 -212.35675,-2.35952 z");
        $area->setStatus("OK");
        $area->setPlanId(1);
        $area->setDescription("Bureau");
        $area->insertIntoDatabase($db);
    
        $area = new AreaModel();
        $area->setTitle("Opem Space 2");
        $area->setPath("m 567.22848,472.39241 264.73808,0.4719 0.4719,22.17948 17.93235,0 -0.94381,256.24382 -16.51663,0 -0.47191,18.87615 -264.73808,0 -1.41571,-19.81996 -18.87616,0.94381 0.47191,-257.65953 18.87615,0.94381 z");
        $area->setStatus("OK");
        $area->setPlanId(1);
        $area->setDescription("Space");
        $area->insertIntoDatabase($db);
   
        $area = new AreaModel();
        $area->setTitle("Bureau No4");
        $area->setPath("m 264.73808,776.77042 494.55528,7.55046 c 0,0 3.30333,272.28852 1.41571,272.28852 -1.88761,0 -190.17727,0 -190.17727,0 l -0.4719,-23.1233 -305.79372,0.9438 z");
        $area->setStatus("OK");
        $area->setPlanId(1);
        $area->setDescription("Bureau");
        $area->insertIntoDatabase($db);
   
        $area = new AreaModel();
        $area->setTitle("Bureau No5");
        $area->setPath("m 970.7063,840.00554 c 2.35952,0 164.6945,0.9438 164.6945,0.9438 l 2.3595,90.13365 -70.7856,103.34691 -93.90888,-0.4719 z");
        $area->setStatus("OK");
        $area->setPlanId(1);
        $area->setDescription("Bureau");
        $area->insertIntoDatabase($db);
    
        $area = new AreaModel();
        $area->setTitle("Bureau No6");
        $area->setPath("m 767.31573,839.06173 c 2.83142,0 197.72773,0.94381 197.72773,0.94381 l -1.41571,193.00866 -127.41406,0.4719 -0.4719,25.4828 -67.48226,-0.9438 z");
        $area->setStatus("OK");
        $area->setPlanId(1);
        $area->setDescription("Bureau");
        $area->insertIntoDatabase($db);
   
        $area = new AreaModel();
        $area->setTitle("Bureau No7");
        $area->setPath("m 856.03366,411.5168 161.86304,1.41572 0.9438,419.99446 -161.86303,1.41571 z");
        $area->setStatus("OK");
        $area->setPlanId(1);
        $area->setDescription("Bureau");
        $area->insertIntoDatabase($db);
    
}
