<?php include_once('session-active.php'); ?>
<?php include("../../service/patient_service.php");?>
<title>index</title>
<?php
  //get appointment id
  $appointment_id=$_GET['app_id'];
  //echo $appointment_id;

  //get patient id
      $user_name=$_SESSION['Puser_name'];
      $res1=get_patient_profile($user_name);
      $row2=mysqli_fetch_assoc($res1);
      $patient_id=$row2['id'];
      //echo $patient_id;

  //update the status using appointment id
    //book_appointment($appointment_id);
    //echo "Booked";
      book_appointment_by_patient($appointment_id,$patient_id);



  //insert into appointment list
    
    //get appoint date and time 
    $res=get_all_appointment($appointment_id);
    $row1=mysqli_fetch_assoc($res);
    $did=$row1['doctor_id'];
    $ap_date=$row1['appoint_date'];
    $ap_time=$row1['appoint_time'];

    //echo $did ." ". $ap_date. " ". $ap_time;
    //echo '<br/>';

    add_appoint_list($appointment_id, $patient_id, $did, $ap_date, $ap_time);

    //message
      echo '<br/>';
      echo "Appointment Booked successfully";
      echo "<script>setTimeout(\"location.href = 'bookappointment.php';\",1500);</script>";


?>