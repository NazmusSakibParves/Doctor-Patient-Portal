
<?php include("patient-reg-form-validation.php");?>

<title>Registration form</title>
<style>

body{
  /*background-color: #eee;*/
  background-image: url(img/pic.png);
}
input[type=text], select {
    width: 35%;
    padding: 8px 10px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
}
input[type=password] {
    width: 35%;
    padding: 8px 10px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type=submit] {
    width: 20%;
    background-color: #4CAF50;
    color: white;
    padding: 10px 10px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-left: 160px;
}

input[type=submit]:hover {
    background-color: #45a049;
}
#back{
    text-decoration: none;
    border:1px solid gold;
    padding: 8px;
    color: #fff;
    border-radius: 4px;
}
#back:hover{
    background-color: #4CAF50;
    color: #fff;
    border:1px solid #4CAF50;
    padding: 8px;
    border-radius: 4px;
}

div #regdiv{
  
    border-radius: 4px;
    /*background-image: url(img/pic.png);*/
    padding: 20px;
    margin-left: 0px;
}
  #title_under{
    width: 400px;
  }
.hrtitle{
    border: 1px solid gold;
    padding: 12px;
    border-radius: 5px;
    color: #fff;
    /*background-image: url(img/pic3.jpg);*/
  }
  label{
    color: #fff;
  }
  .error{
    color: red;
  }

</style>

<style type="text/css">
  .pform{
      /*border: 1px solid green;
      border-radius: 5px;*/
      padding: 20px;
      width: 700px;
  }
</style>

<!-- start of javascript validation -->

<script type="text/javascript">
    function validation(){

      var name_valid=nameValidation();
        var user_name_valid=usernameValidation();
        var password_valid=passwordValidation();
          var re_password_valid=re_passValidation();
            var email_valid=emailValidation();
            var contact_valid=contactValidation();
            var address_valid=addressValidation();

      if(name_valid==true && user_name_valid==true && password_valid==true && 
        re_password_valid==true && email_valid==true && contact_valid==true && address_valid==true){
        return true;
      }
      else{
        return false;
      }
    }


    //name validation
    function nameValidation(){
      var name=document.getElementById("name").value;
      if(name==""){
        
        displayError_Message("name","nameErr","Name Required");
        return false;
      }
      else{
        var space=0;
        var dash=0;
        for(var i=0;i<name.length;i++){
          var spc="notfound";
          if(name[i]>='a' && name[i]<='z' || name[i]>='A' && name[i]<='Z' || name[i]==' ' || name[i]=='.' || name[i]=='-'){
            if(name[i]==' '){
              space++;
            }
            if(name[i]=='-'){
              dash++;
            }
          }
          else{
            spc="found";
            break;
          }
        }
        if(space<3 && dash<2 && spc=="notfound"){
          return true;
        }
        else{
          
          displayError_Message("name","nameErr","Invalid Name");
          return false;
        }
      }
    }



    //username validation
    function usernameValidation(){
      var username=document.getElementById("username").value;
      if(username==""){
        
        displayError_Message("username","usernameErr","Username Required");
        return false;
      }
      else{
        var space=0;
        var dash=0;
        for(var i=0;i<username.length;i++){
          var spc="notfound";
          if(username[i]>='a' && username[i]<='z' || username[i]>='A' &&
           username[i]<='Z' || username[i]==' ' || username[i]=='.' || username[i]=='-'){
            if(username[i]==' '){
              space++;
            }
            if(username[i]=='-'){
              dash++;
            }
          }
          else{
            spc="found";
            break;
          }
        }
        if(space<3 && dash<2 && spc=="notfound"){
          return true;
        }
        else{
          
          displayError_Message("username","usernameErr","Invalid Username");
          return false;
        }
      }
    }


    //password validation
    function passwordValidation(){
      var password=document.getElementById("password").value;
      if(password==""){
        
        displayError_Message("password","passErr","Password Required");
        return false;
      }
      else{
        if(password.length>=8){
          var upper=0;
          var lower=0;
          var digit=0;
          for(var i=0;i<password.length;i++){
            if(password[i]>='a' && password[i]<='z'){
              lower++;
            }
            if(password[i]>='A' && password[i]<='Z'){
              upper++;
            }
            if(isNumber(password[i])){
              digit++;
            }
          }
          if(upper>=1 && lower>=1 && digit>=1){
            return true;
          }
          else{
           
            displayError_Message("password","passErr","Password should contain 1 uppercase 1 lowercase 1 digit");
            return false;
          }
        }
        else{
          
          displayError_Message("password","passErr","Password length should be 5 character");

          return false;
        }
      }
    }

    //re password validation 
    function re_passValidation(){
      var password=document.getElementById("password").value;
      var re_password=document.getElementById("re_password").value;
      if(re_password==""){
        
        displayError_Message("re_password","re_passErr","Confirm password Required");
        return false;
      }
      else{
        if(re_password==password){
          return true;
        }
        else{
          
          displayError_Message("re_password","re_passErr","Password And Confirm password not matched");
        return false;
        }
      }
    }
    

    //mail validation 
    function emailValidation(){
      var email=document.getElementById("email").value;
      if(email==""){
       
        displayError_Message("email","emialErr","Email Required");
        return false;
      }
      else{
        var em=email.split("@");
        if(em.length==2){
          var e=em[1].split(".");
          if(e.length==2 && e[0].length>1 && e[1].length>1){
            return true;
          }
          else{
            
            displayError_Message("email","emialErr","Incorrect Email");
            return false;
          }
        }
        else{
          
          displayError_Message("email","emialErr","Incorrect Email");
          return false;
        }
      }
    }

    //address validation
    function addressValidation(){
      var address=document.getElementById("address").value;
      if(address==""){
        
        displayError_Message("address","addressErr","Address Required");
        return false;
      }
      else{
        return true;
      }
    }


    //contact validation
    function contactValidation(){
      var contact=document.getElementById("contact").value;
      if(contact==""){
        
        displayError_Message("contact","contactErr","Phone No Required");
        return false;
      }
      else{
        if(contact.length<=11){
          if(isNumber(contact)){
            return true;
          }
          else{
            
            displayError_Message("contact","contactErr","Please Enter Correct Contact No");
            return false;
          }
        }
        else{
          
          displayError_Message("contact","contactErr","Please Enter Correct Contact No");
          return false;
        }
      }
    }




    function isNumber(number){
      var num=true;
      for(var i=0;i<number.length;i++){
        if(number[i]>='0' && number[i]<='9'){
          num=true;
        }
        else{
          num=false;
          break;
        }
      }
      if(num==true){
        return true;
      }
      else{
        return false;
      }
    }


    function displayError_Message(id,spanid,message) {
            var err = document.getElementById(spanid);
            err.style.color = "red";
            err.innerHTML = message;
            err.style.visibility = 'visible';
            
        }
        
        //for hide error message
         function hide_msg(id) {
            document.getElementById(id).style.visibility = 'hidden';
        }


    
  </script>

  <!-- End of javascript validation -->




  <div id="main" align="center">
     <div id="regdiv" align=center>
        <div align="center">
          <h3 style="color:#fff;margin-top:0">REGISTRATION FORM</h3>
          <div id="title_under">
            <hr/>
          </div>
          
        </div>
        <div align="center" style="margin-left:250px">
              <label style="color:red">* </label>
              <label style="color:gold">indicates required</label>
            </div>

            <div align="center">
              <label style="color:gold;"><?php echo $successmess;?></label>
            </div>

        <form method="post" action="<?=$_SERVER['PHP_SELF']?>" onsubmit="return validation()>
      
        <div class="pform">
        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Name<span style="color:red">*</span></label>
        <input type="text" id="name" name="name" value="<?php echo $name;?>" placeholder="enter name" onclick="hide_msg('nameErr');"><br/>
    <span class="error" id="nameErr"><?php echo $nameErr;?></span><br/>

        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Username<span style="color:red">*</span></label>
        <input type="text" id="username" name="username" value="<?php echo $username;?>" placeholder="username" onclick="hide_msg('usernameErr');"><br/>
    <span class="error" id="usernameErr"><?php echo $usernameErr;?></span><br/>

        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Password<span style="color:red">*</span></label>
        <input type="password" id="password" name="password" onclick="hide_msg('passErr');" placeholder="password"><br/>
    <span class="error" id="passErr"><?php echo $passwordErr;?></span><br/>

        <label style="left:50px">Confirm-Password<span style="color:red">*</span></label>
        <input type="password" id="re_password" onclick="hide_msg('re_passErr');" name="re_password" placeholder="confirm-password"><br/>
    <span class="error" id="re_passErr"><?php echo $re_passwordErr;?></span><br/>

        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Gender</label>
        <select id="gender" name="gender">
           <option value="Male">Male</option>
           <option value="Female">Female</option>
          </select><br/><br/>

        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-mail Address<span style="color:red">*</span></label>
        <input type="text" id="email" name="email" value="<?php echo $email;?>" placeholder="e-mail address" onclick="hide_msg('emialErr');"><br/>
    <span class="error" id="emialErr"><?php echo $emailErr;?></span><br/>
    

        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Blood Group</label>
        <select id="bloodgroup" name="bloodgroup">
           <option>AB+</option>
           <option>AB-</option> 
           <option>B+</option>
           <option>A+</option>
           <option>O+</option>
           <option>B-</option>
           <option>A-</option>
           <option>O-</option>
          </select><br/><br/>

          <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address<span style="color:red">*</span></label>
        <input type="text" id="address" name="address" value="<?php echo $address;?>" placeholder="address" onclick="hide_msg('addressErr');"><br/>
    <span class="error" id="addressErr"><?php echo $addressErr;?></span><br/>

        
        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact Number<span style="color:red">*</span></label>
        <input type="text" id="contact" name="contact" value="<?php echo $contact;?>" placeholder="contact number" onclick="hide_msg('contactErr');"><br/>
    <span class="error" id="contactErr"><?php echo $contactErr;?></span><br/>

        <br/>
          <input type="submit" id="submitbtn" value="Apply" onclick="validation()">
        
        </div>
      </form>



      <div align="center">
        <a id="back" href=" ../index.php">Back to login page</a>
      </div>
      
  </div>



<!--Bottom options -->
<br/><br/>
  <div align="center">
    <label class="hrtitle">&copy;2015-2016 | Doctor Patient Portal | American International University-Bangladesh(AIUB) | All right reserved</label>
    <br/><br/>
  </div>