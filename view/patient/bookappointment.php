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

  <hr style="color:red;" />
  <div id="main" align="center">
      <div id="Registration">
       <h3 style="color:blue;">BOOKING APPOINTMENT</h3>
       <hr/>
       </div>
     </div>


     <div id="regdiv">
        <div align="center">
              
        </div>   


            <div align="right">
              <label style="color:red">* </label>
              <label>indicates required</label>
            </div>
        
      <form action="bookappointment.php" method="post">
        
        <label>Category</label>
        <select id="category" name="category">
           <option>Select</option>
           <option>Anesthesiologist</option>
           <option>Cardiologist</option>
           <option>Dentist</option>
           <option>Diabetologist</option>
           <option>Emergency physician</option>
           <option>Gynaecologist</option>
           <option>Neurologist</option>
           <option>Serologist</option> 
          </select>

          <label>Select Doctor</label>
        <select id="doctor" name="doctor">
           <option>Select</option>
            <?php
                    $category=$_POST['category'];
                    $result = get_all_doctor(); 

                 while($row = mysqli_fetch_assoc($result)){        
                 echo '<option value="'.$row['id'].'">'.$row['first_name'].'</option>';
              
           }
           
          ?> 
          </select>
          
          
          <label>Date</label>
        <input type="text" id="date" name="date" placeholder="Date">
		
		  <label>Time</label>
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

        <br/>
        <input type="submit" name="submitbtn" value="Check">
      </form>
  </div>


   <div>
              <?php
                  $errormsg1=$errormsg2=$errormsg3="";

                  if($_SERVER['REQUEST_METHOD']=="POST"){

                   // $res=get_all_doctor();
                    //$drow=mysqli_fetch_assoc($res);
                    //$doctor_id=$drow['id'];
                    //$category=$_POST['category'];
                    //$result_dept=get_doctor_by_specialty($category);
                    //$dept_row=mysqli_fetch_assoc($result_dept);


                 /*$category=$_POST['category'];
                 $result = get_doctor_by_specialty($category); 
                 $row=mysqli_fetch_assoc($result);
                 $fname=$row['first_name'];
                 echo $fname;*/

                    //$category=$_POST['category'];
                    //$res1 = get_doctor_by_specialty($category);
                    //$row1=mysqli_fetch_assoc($res1);
                    //$id=$row1['id'];

                    $doctor1=$_POST['doctor'];
                    //$res2=search_appointment($doctor1);
                    //$row2=mysqli_fetch_assoc($res2);
                    //$did=$row2['doctor_id'];
                    //echo $did;

                    $res2=search_appointment($doctor1); 
          if(mysqli_num_rows($res2) > 0){
                echo '<br/>';
                echo '<div align="center">
                      <label style="color:blue">Search Result</label>
                </div><br/>';
  echo '<table  style="border-collapse: collapse; width: 100%;">';
  echo '<tr id="maintr">
        <td id="maintd">Doctor ID</td>
        <td id="maintd">Appoint Date</td>
        <td id="maintd">Appoint Date</td>
        <td id="maintd">status</td>
        <td id="maintd">Option</td>
      </tr>';   
  while($row = mysqli_fetch_assoc($res2)){        
      echo '<tr id="datatr">
        <td id="datatd">'.$row['doctor_id'].'</td>
        <td id="datatd">'.$row['appoint_date'].'</td>
        <td id="datatd">'.$row['appoint_time'].'</td>
        <td id="datatd">'.$row['status'].'</td>
        <td id="datatd"><a href="bookappointment-handler.php?app_id=' .$row['id']. '">Book</a></td>
      </tr>';   
  }
  echo '</table>';
  }
  else{
    echo '<div align="center">
         <p style="color:red">No data found</p>
    </div>'  ;
   
  }


   }

   ?>
   </div><br/><br/>



<!--Bottom options -->
<?php include("bottomfotor.php");?>