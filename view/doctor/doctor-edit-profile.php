<?php include_once('session-active.php'); ?>

<?php include_once('../../service/doctor_service.php');?>

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
    margin-top: 1px;
    padding: 18px;
    width: 360px;
    margin-left: 250px;
}
</style>


  <hr style="color:red;" />
  <div id="main" align="center">
      <div id="Registration">
       <h3 style="color:blue;">EDIT PROFILE OPTION</h3>
       <hr style="color:red" />
       </div>
     </div>


     <div id="regdiv">
        <div align="center" style="margin-top:0px">
          <h3 style="color:#4CAF50">Edit Profile</h3>
          <hr/>
        </div>


        <div align="center">
            <?php
                $user_name=$_SESSION['Duser_name'];
                //echo $user_name;
                $res=get_doctor_profile($user_name);
                $drow=mysqli_fetch_assoc($res);
                //get the doctor details 
                $first_name=$drow['first_name'];
                $last_name=$drow['last_name'];
                $gender=$drow['gender'];
                $email=$drow['email'];
                $specialty=$drow['specialty'];
                $address=$drow['address'];
                $contact_no=$drow['contact_no'];

            ?>

            <?php

          if(isset($_POST['submitbtn']) == 'POST'){
            $fname=$_POST['firstname'];
            $lname=$_POST['lastname'];
            $d_gender=$_POST['gender'];
            $d_email=$_POST['email'];
            $d_specialty=$_POST['specialty'];
            $d_address=$_POST['address'];
            $d_contact=$_POST['contact'];
             
             if(!empty($fname) && !empty($lname) && !empty($fname) && !empty($d_email) && 
                     !empty($d_address) && !empty($d_contact)){

                edit_doctor_profile($user_name, $fname, $lname, $d_gender, $d_email,
                    $d_specialty,$d_address, $d_contact);

                    /*echo '<script language="javascript">
                    alert("Successfully done")
                    </script>';*/
                    echo '<br/>';
      echo '<div><label style="color:green">Profile updated successfully</label></div><br/>';
      echo "<script>setTimeout(\"location.href = 'doctor-profile.php';\",1500);</script>";
              }

              else{
                  echo '<label style="color:red">Fill all the fields</label>';
              }

          }

        ?>


        </div>

        
      <form method="post" action="doctor-edit-profile.php">
      
        <label>First Name<span style="color:red">*</span><span style="color:red;"></span></label>
        <input type="text" id="fname" value="<?=$first_name?>" name="firstname" placeholder="first name">

          <label>Last Name<span style="color:red">*</span></label>
        <input type="text" id="lname" value="<?=$last_name?>" name="lastname" placeholder="last name">


        <label>Gender</label>
        <select id="gender" name="gender">
           <option value="<?=$gender?>"><?=$gender?></option>
           <option value="Male">Male</option>
           <option value="Female">Female</option>
        </select>

        <label>E-mail Address<span style="color:red">*</span></label>
        <input type="text" id="email" value="<?=$email?>" name="email" placeholder="e-mail address">

        <label>Specialty</label>
        <select id="specialty" name="specialty">
           <option><?=$specialty?></option>
           <option>Anesthesiologist</option>
           <option>Cardiologist</option>
           <option>Dentist</option>
           <option>Diabetologist</option>
           <option>Emergency physician</option>
           <option>Gynaecologist</option>
           <option>Neurologist</option>
           <option>Serologist</option> 
        </select>

        <label>Address<span style="color:red">*</span></label>
        <input type="text" id="address" value="<?=$address?>" name="address" placeholder="address">

        <label>Contact Number<span style="color:red">*</span></label>
        <input type="text" id="contact" value="<?=$contact_no?>" name="contact" placeholder="contact number">

        <br/>
        <input type="submit" id="submitbtn" name="submitbtn" value="Save">

      </form>
      
  </div>

      



<!--Bottom options -->
<?php include("bottomfotor.php");?>