<!--dashboard options -->
<?php include("patientdashboard.php");?>

<style>
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
       <h3 style="color:blue;">CHANGE PASSWORD OPTION</h3>
       <hr style="color:red" />
       </div>
     </div>


     <div id="regdiv">
        <div align="center">
          <h3 style="color:#4CAF50">Change Password</h3>
          <hr/>
        </div>
        
      <form action="">

        <label>Old Password<span style="color:red">*</span></label>
        <input type="password" id="oldpassword" name="oldpassword" placeholder="old password">

        <label>New Password<span style="color:red">*</span></label>
        <input type="password" id="newpassword" name="newpassword" placeholder="new password">

        <label>Confirm-Password<span style="color:red">*</span></label>
        <input type="password" id="re_password" name="re_password" placeholder="confirm-password">

        <br/>
        <input type="submit" value="Confirm">
      </form>
  </div>

<!--Bottom options -->
<?php include("bottomfotor.php");?>