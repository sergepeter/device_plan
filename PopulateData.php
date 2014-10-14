<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function createDefaultData($db) {

    $plan1 = new FloorPlanModel();
    $plan1->setCoordE(0);
    $plan1->setCoordN(0);
    $plan1->setDescription("Cheseaux plan de l'usine de fabrication");
    $plan1->setHeight(1000);
    $plan1->setPlanUrl("/resouces/cheseauPlan.png");
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
    $plan2->setPlanUrl("/resouces/ventePlan.png");
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



