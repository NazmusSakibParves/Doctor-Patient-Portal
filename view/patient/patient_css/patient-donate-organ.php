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
       <h3 style="color:blue;">DONAR REGISTRATION FORM</h3>
       <hr style="color:red" />
       </div>
     </div>


     <div id="regdiv">
        <div align="center">
          <h3 style="color:#4CAF50">Registration Form</h3>
          <hr/>
        </div>
        
      <form action="">
        <label>Name<span style="color:red">*</span></label>
        <input type="text" id="fname" name="firstname" placeholder="first name">

        <label>Gender</label>
        <select id="gender" name="gender">
           <option value="Male">Male</option>
           <option value="Female">Female</option>
          </select>

          <label>E-mail Address<span style="color:red">*</span></label>
        <input type="text" id="email" name="email" placeholder="e-mail address">

        <label>Blood Group</label>
        <select id="bloodgroup" name="bloodgroup">
           <option>B+</option>
           <option>A+</option>
           <option>O+</option>
           <option>B-</option>
           <option>A-</option>
           <option>O-</option>
           <option>AB+</option>
           <option>AB-</option> 
          </select>

          <label>Address<span style="color:red">*</span></label>
        <input type="text" id="address" name="address" placeholder="address">

        <label>Contact Number<span style="color:red">*</span></label>
        <input type="text" id="contact" name="contact" placeholder="contact number">

        <label>Select organ</label>
        <select id="organ" name="organ">
           <option>Select organ</option>
          </select>

        <br/>
        <input type="submit" value="Apply">
      </form>
  </div>

<!--Bottom options -->
<?php include("bottomfotor.php");?>