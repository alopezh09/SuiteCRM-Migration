<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2022-02-03 23:11:13
$dictionary["Spay_Schedule_Payment_Applicant"]["fields"]["veta_recibo_spay_schedule_payment_applicant_1"] = array (
  'name' => 'veta_recibo_spay_schedule_payment_applicant_1',
  'type' => 'link',
  'relationship' => 'veta_recibo_spay_schedule_payment_applicant_1',
  'source' => 'non-db',
  'module' => 'Veta_Recibo',
  'bean_name' => 'Veta_Recibo',
  'vname' => 'LBL_VETA_RECIBO_SPAY_SCHEDULE_PAYMENT_APPLICANT_1_FROM_VETA_RECIBO_TITLE',
  'id_name' => 'veta_recibo_spay_schedule_payment_applicant_1veta_recibo_ida',
);
$dictionary["Spay_Schedule_Payment_Applicant"]["fields"]["veta_recibo_spay_schedule_payment_applicant_1_name"] = array (
  'name' => 'veta_recibo_spay_schedule_payment_applicant_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_VETA_RECIBO_SPAY_SCHEDULE_PAYMENT_APPLICANT_1_FROM_VETA_RECIBO_TITLE',
  'save' => true,
  'id_name' => 'veta_recibo_spay_schedule_payment_applicant_1veta_recibo_ida',
  'link' => 'veta_recibo_spay_schedule_payment_applicant_1',
  'table' => 'veta_recibo',
  'module' => 'Veta_Recibo',
  'rname' => 'name',
);
$dictionary["Spay_Schedule_Payment_Applicant"]["fields"]["veta_recibo_spay_schedule_payment_applicant_1veta_recibo_ida"] = array (
  'name' => 'veta_recibo_spay_schedule_payment_applicant_1veta_recibo_ida',
  'type' => 'link',
  'relationship' => 'veta_recibo_spay_schedule_payment_applicant_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_VETA_RECIBO_SPAY_SCHEDULE_PAYMENT_APPLICANT_1_FROM_SPAY_SCHEDULE_PAYMENT_APPLICANT_TITLE',
);

?>