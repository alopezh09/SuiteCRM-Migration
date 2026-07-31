<?php
		
$host    = "veta.soel.com.co";
$user    = "veta";
$pass    = "Veta1234*";
$db_name = "vetacrm2";
$table   = "meetings";
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
$table_insert   = "meetings";

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

$query_select = "SELECT * FROM vetacrm2.".$table." where 
	(assigned_user_id = '40f17204-ab5e-b629-c728-5f8647105a78')
or (assigned_user_id = '31a00644-9229-cd6c-ef57-5ec88dc89e89')
or (assigned_user_id = 'e4c4db80-a351-5dc8-a23a-5a996977e583')
 limit 50 offset 0";
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
