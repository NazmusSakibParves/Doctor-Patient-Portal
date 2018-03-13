<?php include_once('session-active.php'); ?>

<?php include_once('../../service/doctor_service.php'); ?>
<!--dashboard options -->
<?php include("doctordashboard.php");?>
<title>index</title>

<style>
input[type=text], select {
    width: 100%;
    padding: 8px 20px;
    margin: 2px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
}
input[type=password] {
    width: 100%;
    padding: 8px 20px;
    margin: 8px 0;
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


    <script type="text/javascript">
      
      function validate()
    {

  var error="";
  var fname = document.getElementById( "fname" );
  if( fname.value == "" )
  {
  error = "required";
  document.getElementById( "error" ).innerHTML = error;
  return false;
  }
  else
  {
  return true;
  }

    </script>


  <hr style="color:red;" />
  <div id="main" align="center">
      <div id="Registration">
       <h3 style="color:blue;">ADD SCHDULE</h3>
       <hr style="color:red" />
       </div>
     </div>


     <div id="regdiv">
        <div align="center">
          <h3 style="color:#4CAF50">Add Schedule</h3>
          <hr/>
        </div>

        <?php
              $errormsg1="";
              $username=$_SESSION['Duser_name'];

              $res=get_doctor_profile($username);
              $drow=mysqli_fetch_assoc($res);
              $doctor_id=$drow['id'];

            if(isset($_POST['submitbtn'])){

              $doctor_id=$_POST['doctor_id'];
              $appoint_date=$_POST['date'];
              $appoint_time=$_POST['time'];
              $status=$_POST['status'];
              

              if(empty($appoint_date)){
                  $errormsg1="Enter Date";               
              }

                else{
                    $date=$appoint_date;
                   if(preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date)){
                         //to do
                       add_schedule($doctor_id,$appoint_date,$appoint_time,$status);
                       echo '<div align="center">
                       <label style="color:green">Schedule Successfully Added</label>
                       </div>';

                   }
                   else{
                        $errormsg1="Invalid date";
                   }

               
              }


            }
        ?>

        
      <form method="post" action="doctor-set-appointment.php">
      
        <label>Doctor ID</label>
        <input type="text" readonly id="doctor_id" value="<?=$doctor_id?>" name="doctor_id" placeholder="doctor id">
        

        <label>Date<span style="color:red">*</span></label>
        <input type="text" id="date" name="date" placeholder="yyyy-mm-dd">
        <span style="color:red"><?=$errormsg1?></span><br/>
      
        <label>Time<span style="color:red">*</span></label>
        <select id="time" name="time">
           <option>9:00  am</option>
           <option>10:00 am</option>
           <option>11:00 am</option>
           <option>12:00 pm</option>
           <option>1:00  pm</option>
           <option>3:00  pm</option>
           <option>4:00  pm</option>
           <option>5:00  pm</option>
           <option>6:00  pm</option>
        </select>

        <label>Status</label>
        <select id="status" name="status">
           <option value="available">available</option>
           <option value="not available">not available</option>
        </select>
        

        
        <input type="submit" id="submitbtn" name="submitbtn" value="Add Schedule">


      </form>
      
  </div>



      



<!--Bottom options -->
<?php include("bottomfotor.php");?>