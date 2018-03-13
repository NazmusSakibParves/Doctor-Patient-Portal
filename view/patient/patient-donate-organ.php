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

  <hr style="color:red;" />
  <div id="main" align="center">
      <div id="Registration">
       <h3 style="color:blue;">DONOR REGISTRATION FORM</h3>
       <hr/>
       </div>
  </div>

     <div id="regdiv">
        <div align="center">
          <h3 style="color:#4CAF50;margin-top:0">Registration Form</h3>
          <hr/>
        </div>

        <?php
            $username=$_SESSION['Puser_name']; 
            $result = get_patient_profile($username);
            $row = mysqli_fetch_assoc($result);
            $name=$row['name'];
            $gender=$row['gender'];
            $email=$row['email'];
            $blood_group=$row['blood_group'];
            $address=$row['address'];
            $contact_no=$row['contact_no'];
            

        ?>
        
        <?php
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
              $organ_id=$_POST['organ'];

              if(!empty($name) && !empty($address) && !empty($contact_no) && 
            $organ_id!="Select organ"){
                $res = get_all_organ_by_id($organ_id); 
                $row1 = mysqli_fetch_assoc($res);
                $organ_name=$row1['organ_name'];

              add_new_donar($organ_id, $name, $gender, $email, $blood_group, 
                $address, $contact_no, $organ_name);
              echo '<br/>';
      echo '<div><label style="color:green">Successfully done</label></div><br/>';
      echo "<script>setTimeout(\"location.href = 'patienthome.php';\",1500);</script>";
          }
          else{
            echo '<label style="color:red">Fill all the Field</label>';
          }
          }
        ?>



        
      <form action="patient-donate-organ.php" method="post">
        <label>Name<span style="color:red">*</span></label>
        <input type="text" readonly id="name" name="name" value="<?=$name?>" placeholder="name">

        <label>Gender<span style="color:red">*</span></label>
        <input type="text" readonly id="gender" name="gender" value="<?=$gender?>" placeholder="gender">

          <label>E-mail Address<span style="color:red">(if you want)</span></label>
      <input type="text" id="email" name="email" value="<?=$email?>" placeholder="e-mail address">

        <label>Blood Group<span style="color:red">*</span></label>
        <input type="text" readonly id="bloodgroup" value="<?=$blood_group?>" name="bloodgroup" placeholder="bloodgroup">

          <label>Address<span style="color:red">*</span></label>
        <input type="text" readonly id="address" name="address" value="<?=$address?>" placeholder="address">

        <label>Contact Number<span style="color:red">*</span></label>
        <input type="text" id="contact" name="contact" value="<?=$contact_no?>" placeholder="contact number">

        <label>Select organ</label>
        <select id="organ" name="organ">
           <option>Select organ</option>
            <?php
                 $result = get_all_organ(); 
                 while($row = mysqli_fetch_assoc($result)){        
                 echo '<option value="'.$row['id'].'">'.$row['organ_name'].'</option>';
           }
          ?>
          </select>

        <br/>
        <input type="submit" value="Apply">
      </form>
  </div>

<!--Bottom options -->
<?php include("bottomfotor.php");?>