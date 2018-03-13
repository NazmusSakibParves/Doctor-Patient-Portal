<?php include_once('session-active.php'); ?>
<?php include_once('../../service/patient_service.php');?>
<!--dashboard options -->
<?php include("patientdashboard.php");?>
	<title>index</title>
	<style type="text/css">
		.weldiv{
			width: 200px;
		}
	</style>
	<style type="text/css">
	  tr#maintr{
	  	/*background-color: #4CAF50;*/
    	color: white;
    	background-color: #024E81;
	  }

	  td#maintd{
	  	border: 0.2px solid #dddddd;
	  	text-align: center;
	  	padding: 5px;

	  }

	  tr#datatr:nth-child(even){
	 	 background-color: #B9CEDC;
	  }

	  td#datatd{
	  	border: 0.2px solid #dddddd;
	  	text-align: left;
	  	padding: 6px;
	  }


</style>

<hr>
	<div id="main" align="center">
      <div id="Registration">
       <h3 style="color:blue;">HOME</h3>
       <hr/>
       </div>
     </div>
	 
	  
	<?php
		$username=$_SESSION['Puser_name'];
	
		echo '<div class="weldiv" align="center">
				<a class="profile" href="patient-profile.php">Welcome '.$username.
				 '</a> <hr/>
		</div> <br/>';
	 ?>

	 	<div align="center" style="width:200px; margin-left:350px">
	 		<label style="color:blue">TREATMENT HISTORY</label>
	 		<br/>
	 	</div>

	 <div align="center">
	 		<br/>
   <?php

        if($_SERVER['REQUEST_METHOD'] == 'GET'){
        	    $result1 = get_patient_profile($username);
	 			$row1 = mysqli_fetch_assoc($result1);
	 			$patient_id=$row1['id'];
	 			//echo $patient_id;
  			$result = get_treatment_history($patient_id);
 			 if(mysqli_num_rows($result) > 0){ 
  
  			echo '<table  style="border-collapse: collapse; width: 100%;">';
  		echo '<tr id="maintr">
        	<td id="maintd">Patient ID</td>
       	    <td id="maintd">Doctor Name</td>
        	<td id="maintd">Treatment For</td>
            <td id="maintd">Treatment</td>
            <td id="maintd">Note</td>
            <td id="maintd">Date Time</td>
         </tr>';   
     while($row = mysqli_fetch_assoc($result)){        
       echo '<tr id="datatr">
        	<td id="datatd">'.$row['patient_id'].'</td>
        	<td id="datatd">'.$row['dname'].'</td>
        	<td id="datatd">'.$row['treatment_for'].'</td>
       	    <td id="datatd">'.$row['treatment'].'</td>
        	<td id="datatd">'.$row['note'].'</td>
        	<td id="datatd">'.$row['created_at'].'</td>
          </tr>';   
  }
  echo '</table>';
  }
  else{
    echo '<p style="color:red">No treatement history found</p>';
  }
  }


	?>

	 </div>

<!--Bottom options -->
<?php include("bottomfotor.php");?>