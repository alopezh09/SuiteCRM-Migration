<?php
		
$host    = "veta.soel.com.co";
$user    = "veta";
$pass    = "Veta1234*";
$db_name = "vetacrm2";
$table   = "leads_cstm";
/*
$host    = "localhost";
$user    = "root";
$pass    = "Webmaster0983";
$db_name = "vetacrm2";
$table   = "notes";
*/

//$host_insert    = "localhost";
$host_insert    = "localhost:3306";
//$user_insert    = "root";
$user_insert    = "bn_suitecrm";
//$pass_insert    = "Webmaster0983";
$pass_insert    = "4ce9ac0f71";
$db_name_insert = "vetacrm2";
$table_insert   = "leads_cstm";

$date_filter = '2021-11-29';



$count_header = 0;

$insert_header = "insert into vetacrm2.".$table." (";
$second_query ="";
$count_success = 0;
$count_error = 0;
$count_duplicated = 0;


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
//SELECT * FROM vetacrm2.".$table." where  date_modified >= '".$date_filter."' and 
$query_select = "


select * from vetacrm2.leads_cstm where id_c in ( 
( 
SELECT id FROM vetacrm2.leads where id in 
( 
SELECT veta_requerimiento_leadsleads_ida FROM vetacrm2.veta_requerimiento_leads_c where veta_requerimiento_leadsveta_requerimiento_idb in 
( 
( 
SELECT id FROM vetacrm2.veta_requerimiento where 
(
	/*(assigned_user_id = '31a00644-9229-cd6c-ef57-5ec88dc89e89') 
    or (assigned_user_id = 'e4c4db80-a351-5dc8-a23a-5a996977e583')*/
    (id = '99f38190-b668-a544-e767-6084b1d884c1')
    or (id = 'b3060566-d2d5-4afb-f458-619b70b5be1c')
    or (id = 'f1dfab74-bbf9-35f9-bf36-617004b7ef39')
    or (id = '63d761f5-28f7-26cc-123b-6084b1a02637')
    or (id = 'ef55b6e2-e2c2-30fe-7d71-61a5b5cb9ea3')
    or (id = '68e60c26-5087-9b81-befa-61a5c2dad8fe')
    or (id = '7a53fa09-8fd2-7bf5-fd2e-6084b0f15abe')
    or (id = 'd661a923-1094-0259-1c10-60845ae3ce2f')
    or (id = '9169c1c9-6a83-b9c2-bec4-61a6e4028ff9')
    or (id = '547d5db9-2ad7-a866-19fb-61a6eb35d134')
    or (id = '702ee421-d563-e402-dff7-617775910914')
    or (id = 'e673e66e-f7a7-f0b7-fdef-61768653491c')
    or (id = 'd37c84f3-67eb-1d1b-6c6e-61739b2a2794')
    or (id = 'b2793da6-6929-edbc-b9e9-6172a11b9636')
    or (id = '5bd4ff6c-2e2d-ec76-ec87-6171f853e519')
    or (id = 'bc0cece9-abec-8dd4-1b3c-6137f12fd33b')
    or (id = 'cbe48ab9-7206-4ec8-be17-6124c2811c21')
    or (id = 'bd3c1df1-c4d7-9928-8a78-60cda874c751')
    or (id = 'da6560bf-7bea-76de-5a70-61a725de99d5')
    or (id = 'af69393a-b2a6-987f-5677-60845274e579')
    or (id = '81434c0f-0f2e-0222-5ab9-61a81512c582')
    or (id = 'd159df86-49cd-770c-95a4-60846de1a576')
    or (id = '77fecb47-176e-d2c5-82f5-61a85eadaace')
    or (id = 'b9f9be3f-c8a8-33c0-e777-6084b1ff2dea')
    or (id = 'a99efb73-bca4-89e8-08dd-61a95bb8caff')
    or (id = '7a439370-50c8-4c28-775c-6164a1130570')
    or (id = '8c211251-aed1-4660-b035-61a97b5ea664')
    or (id = '526932d8-03af-ea32-ea12-61a98823c188')
    or (id = '76584b28-cd85-7017-fb5f-61386c098e73')
    or (id = 'd7510a70-fb73-dfb5-0ae3-611b9576a81d')
    or (id = '80ab0710-b88e-f0c2-8d91-61162309633c')
    or (id = '591fa18f-d5b1-6b82-f41c-61107f1a18f9')
    or (id = '8a5bc895-4ca1-42e9-1e8b-60d154e30f97')
    or (id = 'b6d56740-620d-e764-38ac-613985168d48')
    or (id = '7014b3fd-6844-d0db-00a6-608456bea93d')
    or (id = 'd12988b0-3cb3-dea7-200d-608452a45662')
    or (id = '35b233cb-80bc-f358-a7e5-60845afbd794')
    or (id = '99f38190-b668-a544-e767-6084b1d884c1')
    
) 
order by date_modified desc
) 
) 
) 
) 
) 
/*order by date_modified desc */
limit 100 offset 0";
$result = mysqli_query($connection,$query_select);

echo $query_select."<br /><br /><br />"; 
 /*
   (assigned_user_id = '31a00644-9229-cd6c-ef57-5ec88dc89e89')
or (assigned_user_id = 'e4c4db80-a351-5dc8-a23a-5a996977e583')
   (assigned_user_id = 'd13f0b61-ce0c-04f4-442a-5ecf16984a92' and (estado = 'Active' or estado = 'Consultation_Follow_Up' or estado = 'Consultation_Booked' or estado = 'Cost_Agreement_Paid'))
or (assigned_user_id = 'db15ecb6-86b9-acb1-7d60-5be91404a21b' and (estado = 'Active' or estado = 'Consultation_Follow_Up' or estado = 'Consultation_Booked' or estado = 'Cost_Agreement_Paid'))
or (assigned_user_id = 'e9b75e91-66e9-a637-18fc-5e0fc51d443e' and (estado = 'Active' or estado = 'Consultation_Follow_Up' or estado = 'Consultation_Booked' or estado = 'Cost_Agreement_Paid'))
or (assigned_user_id = '5f450e05-96f2-145c-2ffa-5b86b0cbfc55' and (estado = 'Active' or estado = 'Consultation_Follow_Up' or estado = 'Consultation_Booked' or estado = 'Cost_Agreement_Paid'))
or (assigned_user_id = 'a8df0791-fef6-e844-793a-5c58b04eaae6' and (estado = 'Active' or estado = 'Consultation_Follow_Up' or estado = 'Consultation_Booked' or estado = 'Cost_Agreement_Paid'))
or (assigned_user_id = '2c228535-4ea2-3e12-e67b-5be884f4bd99' and (estado = 'Active' or estado = 'Consultation_Follow_Up' or estado = 'Consultation_Booked' or estado = 'Cost_Agreement_Paid'))
or (assigned_user_id = '688ab293-f4f0-6804-22ca-5be8ce451e66' and (estado = 'Active' or estado = 'Consultation_Follow_Up' or estado = 'Consultation_Booked' or estado = 'Cost_Agreement_Paid'))
or (assigned_user_id = '2344d1ea-4210-8fee-897e-5a999e993db2' and (estado = 'Active' or estado = 'Consultation_Follow_Up' or estado = 'Consultation_Booked' or estado = 'Cost_Agreement_Paid'))
or (assigned_user_id = '3411a746-e972-52dd-c8fa-6046af5e3987' and (estado = 'Active' or estado = 'Consultation_Follow_Up' or estado = 'Consultation_Booked' or estado = 'Cost_Agreement_Paid'))
or (assigned_user_id = '7baaaec8-67e7-e6e5-87b6-61382d5e68dc' and (estado = 'Active' or estado = 'Consultation_Follow_Up' or estado = 'Consultation_Booked' or estado = 'Cost_Agreement_Paid'))
or (assigned_user_id = '10f08f8e-c818-ff81-848e-5eeadc36571b' and (estado = 'Active' or estado = 'Consultation_Follow_Up' or estado = 'Consultation_Booked' or estado = 'Cost_Agreement_Paid'))
*/
$all_property = array();  //declare an array for saving property

//showing property
//echo '<table class="data-table">
//        <tr class="data-heading">';  //initialize table tag
while ($property = mysqli_fetch_field($result)) {
    //echo '<td>' . $property->name . '</td>';  //get field name for header
    array_push($all_property, $property->name);  //save those to array
	
	
	
	if ($count_header == 0) {
		$insert_header = $insert_header. "" . $property->name;
		$count_header++;
	} else {
		$insert_header = $insert_header. " ," . $property->name;
	}
	
	
	
}



$insert_header = $insert_header. ")";



//echo '</tr>'; //end tr tag

//showing all data
while ($row = mysqli_fetch_array($result)) {
    //echo "<tr>";
	
	
	$insert_query = "";
	$count_values = 0;
	$id_item = "";
	
	
    foreach ($all_property as $item) {
        //echo '<td>' . $row[$item] . '</td>'; //get items using property value
		
		$str = $row[$item];
		$pattern = '/"/i';
		
		$row[$item] = preg_replace($pattern, "'", $str);
		/*if ($row[$item] != 0) {
			if (($row[$item] == "") or (empty($row[$item]))) {
		 		unset($row[$item]);
// = NULL;
echo "<br><br>entro if empty <br><br>";
			}
		}
*/
		if ($count_values == 0) {			
			$insert_query = $insert_query. ' values ("' . $row[$item].'"';
			//$insert_query = $insert_query. " values ('" . $row[$item]."'";
			$id_item = $row[$item];
			$count_values++;
		} else {
			if ($row[$item] == "") {
				$row[$item] = NULL;
				$insert_query = $insert_query. " ,NULL";
			} else {
				$insert_query = $insert_query. ' ,"' . $row[$item].'"';
			//$insert_query = $insert_query. " ,'" . $row[$item]."'";
			}
		}
		
	
	
    }
	
	//create connection
	$connection_insert = new mysqli($host_insert, $user_insert, $pass_insert, $db_name_insert);
	

	//test if connection failed
	if ($connection_insert->connect_error) {
	  die("<br />Connection failed: " . $connection_insert->connect_error);
	}
	
	/* change character set to utf8 */
    /*if (!$connection_insert->set_charset("utf8")) {
        printf("<br />Error loading character set utf8: %s\n", $connection_insert->error);
    } else {
        printf("<br />Current character set: %s\n", $connection_insert->character_set_name());
    }*/
	
	
	//$second_query = $second_query."".$insert_header."".$insert_query. "); <br /><br />";
	
	$query_insert = $insert_header."".$insert_query. ");";
	if ($connection_insert->query($query_insert) === TRUE) {
		echo "<br />New record created successfully: ".$id_item;
		echo "<br />".$query_insert."<br />";
		$count_success++;
	} else {
		echo "<br />Error: " .$id_item." <br />" . $connection_insert->error;
		
		if(strpos($connection_insert->error, "Duplicate") !== false){
			echo "<br />";
			$count_duplicated++;
		} else{
			echo "<br /><br />". $query_insert ."<br />";
		}
		$count_error++;
	}
	
	$connection_insert->close();
	
	
	
    //echo '</tr>';
}
//echo "</table>";
//echo $second_query;
mysqli_close($connection);
echo "<br />Registros Agregados: ".$count_success."<br />";
echo "Errores: ".$count_error."<br />";
echo "Duplicados: ".$count_duplicated."<br />";
?>
