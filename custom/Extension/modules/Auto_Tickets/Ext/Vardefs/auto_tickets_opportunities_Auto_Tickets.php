<?php
// created: 2023-01-16 03:09:34
$dictionary["Auto_Tickets"]["fields"]["auto_tickets_opportunities"] = array (
  'name' => 'auto_tickets_opportunities',
  'type' => 'link',
  'relationship' => 'auto_tickets_opportunities',
  'source' => 'non-db',
  'module' => 'Opportunities',
  'bean_name' => 'Opportunity',
  'vname' => 'LBL_AUTO_TICKETS_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'id_name' => 'auto_tickets_opportunitiesopportunities_ida',
);
$dictionary["Auto_Tickets"]["fields"]["auto_tickets_opportunities_name"] = array (
  'name' => 'auto_tickets_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_AUTO_TICKETS_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'auto_tickets_opportunitiesopportunities_ida',
  'link' => 'auto_tickets_opportunities',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
$dictionary["Auto_Tickets"]["fields"]["auto_tickets_opportunitiesopportunities_ida"] = array (
  'name' => 'auto_tickets_opportunitiesopportunities_ida',
  'type' => 'link',
  'relationship' => 'auto_tickets_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_AUTO_TICKETS_OPPORTUNITIES_FROM_AUTO_TICKETS_TITLE',
);
