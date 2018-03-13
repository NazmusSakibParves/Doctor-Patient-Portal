<?php include_once('session-active.php'); ?>

<?php include("../../service/doctor_service.php");?>
<!--dashboard options -->
<?php include("doctordashboard.php");?>
<title>index</title>

<style>
input[type=text] {
    width: 100%;
    padding: 8px 10px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
}

textarea{
    width: 100%;
    height: 70px;
    padding: 8px 10px;
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
    border:1px solid green;
    background-color: #ECEDED;
    padding: 20px;
    width: 360px;
    margin-left: 250px;
}
</style>

        <hr/> 
            <div id="main" align="center">
                 <h3 style="color:blue">ADD NEW NOTE</h3>
                 <hr/>
            </div>


    <?php
            $username=$_SESSION['Duser_name'];
            //echo $username;
            $res=get_doctor_profile($username);
            $row=mysqli_fetch_assoc($res);
            $doctor_id = $row['id'];
            

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
           $username=$_SESSION['Duser_name'];
            //echo $username;
           $res=get_doctor_profile($username);
           $row=mysqli_fetch_assoc($res);
           //get doctor name
           $doctor_id = $row['id'];
           $dfirst_name = $row['first_name'];
           $dlast_name = $row['last_name'];

            //concrete two name
           $full_name=$dfirst_name ." ".$dlast_name;
           //echo $full_name;


            $patient_id=$_POST['pid'];
            $treatment_for=$_POST['treatment_for'];
            $treatment=$_POST['treatment'];
            $note=$_POST['note'];
           

           if(!empty($patient_id) && !empty($treatment_for) && !empty($treatment) && !empty($note)){

                doctor_add_treatment_history($patient_id,$doctor_id,$treatment_for,$treatment,$note,$full_name);
                echo '<div align="center">
                    <label style="color:green">Note Successfully Added.</label>
                </div>';
           }
           else{
                echo '<div align="center">
                    <label style="color:red">Fill all the field</label>
                </div>';
           }
            
        }
    ?>


   <div id="regdiv" style=" width:370px;margin-left:260px">
        <br/>

	    <form action="doctor-add-note.php" method="post">

        <label>Doctor ID<span style="color:red">*</span></label>
        <input type="text" id="did" name="did" readonly value="<?=$doctor_id?>" placeholder="doctor id">
         
        <label>Patient ID<span style="color:red">*</span></label>
        <input type="text" id="pid" name="pid" placeholder="patient id">
        

        <label>Treatment for<span style="color:red">*</span></label>
        <input type="text" id="treatement_for" name="treatment_for" placeholder="treatment for">
        
        <label>Treatment<span style="color:red">*</span></label>
        <textarea type="text" id="treatement" name="treatment" placeholder="treatment"></textarea> 

        <label>Note<span style="color:red">*</span></label>
        <textarea type="text" id="note" name="note" placeholder="write note"></textarea> 

        <br/>
        <input type="submit" name="submit" value="Add Note">
      </form>

    </div>

   <br/>

     </div>

 </div>

<!--Bottom options -->
