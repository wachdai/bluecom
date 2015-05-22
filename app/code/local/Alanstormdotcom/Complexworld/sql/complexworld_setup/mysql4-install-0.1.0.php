<?php

$installer = $this;
//$installer->createEntityTables(
//    $this->getTable('complexworld/eavblogpost'));
$installer->addEntityType('complexworld_eavblogpost', Array(
   'entity_model'      => 'complexworld/eavblogpost',

    'attribute_model'  => '',
    'table'            => 'complexworld/eavblogpost',
    'increment_model'  => '',
    'increment_per_store'=>'0'
));
$installer->installEntities();