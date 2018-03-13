<?php include_once('session-active.php'); ?>

<?php include_once('../../service/doctor_service.php');?>

<!--dashboard options -->
<?php include("doctordashboard.php");?>

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
	  	text-align: center;
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
		$username=$_SESSION['Duser_name'];

		$res=get_doctor_profile($username);
		$row=mysqli_fetch_assoc($res);

		$doctor_id=$row['id'];
		//echo $doctor_id;
		echo '<div class="weldiv" align="center">
				<a class="profile" href="doctor-profile.php">Welcome Dr. '.$username.
				 '</a> <hr/>
		</div> <br/>';

	?>

	
  <div align="center"> 
		<?php
       	
		$result = get_my_appontment($doctor_id);
	if(mysqli_num_rows($result) > 0){	
	
			echo '<br/>';
			echo '<div align="center">
				<label style="color:blue">My Appointment</label>
			</div><br/>';

	echo '<table  style="border-collapse: collapse; width: 100%;">';
	echo '<tr id="maintr">
				<td id="maintd">Doctor ID</td>
				<td id="maintd">Date</td>
				<td id="maintd">Time</td>
				<td id="maintd">Status</td>
			</tr>';		
	while($row = mysqli_fetch_assoc($result)){				
			echo '<tr id="datatr">
				<td id="datatd">'.$row['doctor_id'].'</td>
				<td id="datatd">'.$row['appoint_date'].'</td>
				<td id="datatd">'.$row['appoint_time'].'</td>
				<td id="datatd">'.$row['status'].'</td>
			</tr>';		
	}
	echo '</table>';
	}
	else{
		echo '<p style="color:red">No Appointment Schedule Available</p>';
	}
  

?>

</div>



<!--Bottom options -->
<?php include("bottomfotor.php");?>