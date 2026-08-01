<?php
$file="leads.xls";
$test="";

/*
'db_host_name' => 'localhost:3306',
    'db_host_instance' => '',
    'db_user_name' => 'bn_suitecrm',
    'db_password' => '4ce9ac0f71',
    'db_name' => 'vetacrm2',
    'db_type' => 'mysql',
    'db_port' => '',
    'db_manager' => 'MysqliManager',
	
	remote-suitecrmdbuser
	R*+h3r3us3rP&ssw0rd-*T
	*/
		
$host    = "ec2-34-239-163-93.compute-1.amazonaws.com";
$user    = "remote-suitecrmdbuser";
$pass    = "R*+h3r3us3rP&ssw0rd-*T";
$db_name = "vetacrm2";

//create connection
$connection = mysqli_connect($host, $user, $pass, $db_name);

//test if connection failed
if(mysqli_connect_errno()){
    die("connection failed: "
        . mysqli_connect_error()
        . " (" . mysqli_connect_errno()
        . ")");
}

//get results from database
$result = mysqli_query($connection,"
select recibos.id, recibos.name as 'Number', recibos.date_entered as 'invoice create date', recibos.gran_total as 'Applicant Total to pay', recibos.pendiente_por_pagar as 'Applicant Outstanding Amount', recibos.pagado as 'Applicant paid', recibos.descuento as 'discount Applicant',
	recibos_cstm.company_discount_c as 'Company Discount', recibos_cstm.company_outstanding_amount_c as 'Company Outstanding Amount', recibos_cstm.company_grand_total_c as 'Company Total to pay', recibos_cstm.company_paid_c as 'Company Paid',
    abonos.date_entered as 'Deposit day', abonos.monto as 'Deposit Amount', abonos.description as 'Deposit Description',
    schedule_payments.description as 'Schedule Payment Description', schedule_payments.payment_date as 'Schedule Payment Date', schedule_payments.amount as 'Schedule Payment Amount'
		from 
		vetacrm2.veta_abono_veta_recibo_c as relacion, 
		vetacrm2.veta_recibo as recibos, 
		vetacrm2.veta_abono as abonos, 
		vetacrm2.veta_recibo_cstm as recibos_cstm,
        veta_recibo_spay_schedule_payment_company_1_c as relacion_schedule_payments,
        spay_schedule_payment_company as schedule_payments		
    
 where 
	relacion.veta_abono_veta_reciboveta_recibo_ida = recibos.id 
	and abonos.id = relacion.veta_abono_veta_reciboveta_abono_idb 
	and recibos.id = recibos_cstm.id_c 
    and relacion_schedule_payments.veta_recibo_spay_schedule_payment_company_1veta_recibo_ida = recibos.id
    and relacion_schedule_payments.veta_recib0cd7company_idb = schedule_payments.id       
	and relacion.deleted = 0 order by recibos.name; ");
	
$all_property = array();  //declare an array for saving property

//showing property
echo '<table class="data-table">
        <tr class="data-heading">';  //initialize table tag
while ($property = mysqli_fetch_field($result)) {
    //echo '<td>' . $property->name . '</td>';  //get field name for header
	$test= $test.'<td>' . $property->name . '</td>';
    array_push($all_property, $property->name);  //save those to array
}
//echo '</tr>'; //end tr tag
$test=$test.'</tr>';
//showing all data
while ($row = mysqli_fetch_array($result)) {
    $test=$test. "<tr>";
    
	foreach ($all_property as $item) {
        $test=$test. '<td>"' . $row[$item] . '"</td>'; //get items using property value
    }
    $test=$test. '</tr>';
}
$test=$test. "</table>";

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");
echo $test;
mysqli_close($connection);
?>
