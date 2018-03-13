<?php include_once('session-active.php'); ?>

<?php include_once('../../service/patient_service.php'); ?>

<!--dashboard options -->
<?php include("patientdashboard.php");?>

<title>index</title>
<style>
input[type=text] {
    width: 120px;
    box-sizing: border-box;
    border: 1px solid #999;
    border-radius: 4px;
    font-size: 14px;
    background-color: white;
    background-image: url('img/search.png');
    background-position: 10px 10px;
    background-repeat: no-repeat;
    padding: 8px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 55%;
}
input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
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

 <hr/>
 
   <div id="main" align="center">
      <div id="Registration">
       <h3 style="color:blue">VIEW APPOINTMENT</h3>
      <hr/>
	   
     </div>

  <div id="searchdonardiv" align="right">
      <br/>

       <div align="center">

       <?php
       


  if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $username=$_SESSION['Puser_name'];

       $res=get_patient_profile($username);
       $prow=mysqli_fetch_assoc($res);
       $patient_id=$prow['id'];

  $result = view_appointment_list_by_patient_id($patient_id); 
  if(mysqli_num_rows($result) > 0){

      echo '<label style="color:blue">Appointment History</label>';
      echo '<br/>';
      echo '<br/>';
      echo '<br/>';

  echo '<table  style="border-collapse: collapse; width: 100%;">';
  echo '<tr id="maintr">
        <td id="maintd">Appointment ID</td>
        <td id="maintd">Patient ID</td>
        <td id="maintd">Doctor ID</td>
        <td id="maintd">Appoint Date</td>
        <td id="maintd">Appoint Time</td>
      </tr>';   
  while($row = mysqli_fetch_assoc($result)){        
      echo '<tr id="datatr">
        <td id="datatd">'.$row['appointment_id'].'</td>
        <td id="datatd">'.$row['patients_id'].'</td>
        <td id="datatd">'.$row['doctor_id'].'</td>
        <td id="datatd">'.$row['ap_date'].'</td>
        <td id="datatd">'.$row['ap_time'].'</td>
      </tr>';   
  }
  echo '</table>';
  }
  else{
    echo '<p style="color:red">No appointment history found</p>';
  }
   }

  ?>
   
   </div>



  
	 <!--Bottom options -->
<?php include("bottomfotor.php");?>