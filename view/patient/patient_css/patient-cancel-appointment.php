<!--dashboard options -->
<?php include("patientdashboard.php");?>

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
       <h3 style="color:blue;">CANCEL YOR APPOINTMENT</h3>
       <hr style="color:red" />
       </div>
     </div>


     <div id="regdiv">
        <div align="center">
          <h3 style="color:#4CAF50">Cancel Appointment</h3>
          <hr/>
        </div>
        
      <form method="post" action="cancel-appointment-handler.php">

        <label>Appointment ID</label>
        <input type="text" id="appointmentid" name="appointmentid" placeholder="appointment id">

        <br/>
        <input type="submit" name="submitbtn" value="Cancel">
      </form>
  </div>

  <?php
  
    if(isset($_POST["submitbtn"])=='post'){
      $did=$_POST['appointmentid'];
      if(empty($appointmentid)){

        echo '<span style="color:red;">please enter a valid id</span>';
     }
     else{
          if($appointmentid> '0' && $did < '9999')
          {
            //echo '<span style="color:green;">Valid id</span>';
          }
          else{
            echo '<span style="color:red;">please enter a valid id</span>';
          }
       }
     }

  ?>

<!--Bottom options -->
<?php include("bottomfotor.php");?>