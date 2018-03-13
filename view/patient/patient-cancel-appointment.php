<?php include_once('session-active.php'); ?>

<?php include_once('../../service/patient_service.php');?>
<!--dashboard options -->
<?php include("patientdashboard.php");?>
<title>index</title>

<style>
input[type=text], select {
    width: 100%;
    padding: 8px 20px;
    margin: 2px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
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

div #regdiv{
  align: center;
    border-radius: 4px;
    background-color: #ECEDED;
    padding: 20px;
    width: 360px;
    margin-left: 250px;
}
</style>

  <hr style="color:red;" />
  <div id="main" align="center">
      <div id="Registration">
       <h3 style="color:blue;">CANCEL APPOINTMENT</h3>
       <hr/>
       </div>
     </div>


     <div id="regdiv">
        <div align="center">
          <h3 style="color:#4CAF50">Cancel Appointment</h3>
          <hr/>
        </div>
        
      <form method="post" action="patient-cancel-appointment.php">

        <label>Appointment ID</label>
        <input type="text" id="appointmentid" name="appointmentid" placeholder="appointment id">

        <br/>
        <input type="submit" name="submitbtn" value="Cancel appointment">
      </form>
  </div>

      <div align="center">
        <?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
          $app_id=$_POST['appointmentid'];
          //echo "Appointment ID ".$app_id;
          //echo '<br/>';

          //get patient id
          $username=$_SESSION['Puser_name'];
          $res=get_patient_profile($username);
          $row1=mysqli_fetch_assoc($res);
          $patient_id=$row1['id'];
         // echo "Patient ID ". $patient_id;

          if(!empty($app_id)){
            if($app_id > '0' && $app_id < '9999'){
                //call method for update in the appointment table
                cancel_appointment_update($app_id, $patient_id);
                //call method for remove fromm appoint_list table
                remove_appointment_list($app_id, $patient_id);
                
                echo '<br/>';

      echo '<div><label style="color:green">Appointment cancel successfully</label></div><br/>';
      echo "<script>setTimeout(\"location.href = 'patient-cancel-appointment.php';\",1500);</script>";
            }
            else{
              echo '<label style="color:red">ID should be number</label>';
            }
          }
          else{
            echo '<label style="color:red">Enter a Valid Appointment ID</label>';
          }




        }
          

?>

      </div>

  

<!--Bottom options -->
<?php include("bottomfotor.php");?>