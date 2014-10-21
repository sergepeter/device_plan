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
    $plan1->setCoordE(0);
    $plan1->setCoordN(0);
    $plan1->setDescription("");
    $plan1->setHeight(0);
    $plan1->setPlanUrl("");
    $plan1->setTitle("");
    $plan1->setWidth(0);
    $plan1->insertIntoDatabase($db);

    $plan_cheseaux_id = $plan1->getPlanId();

    echo ("<p>Plan insterted (id:" . $plan_cheseaux_id . ")</p>");


}
