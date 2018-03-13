<?php include_once('session-active.php'); ?>
<?php include("../../service/admin_service.php");?>
<title>index</title>

<?php 

      $firstname=$lastname=$username=$password=$re_password=$email=$address=$contact="";
      $firstnameErr=$lastnameErr=$usernameErr=$passwordErr=$re_passwordErr=$emailErr=$addressErr=$contactErr="";

       $successmess="";

    if($_SERVER['REQUEST_METHOD']=="POST"){

        $gender = $_POST['gender'];
        $specialty = $_POST['specialty'];

        $firstname_valid = firstnameValidation();
        $lastname_valid = lastnameValidation();
        $username_valid = usernameValidation();
        $password_valid = passwordValidation();
        $re_password_valid=re_passValidation();
        $email_valid = emailValidation();
        $address_valid = addressValidation();
        $contact_valid = contactValidation();


        if($firstname_valid==true && $lastname_valid=true && $username_valid== true && $password_valid==true && $re_password_valid==true
            && $email_valid==true && $address_valid==true && $contact_valid==true){

              add_doctor($firstname, $lastname, $username, $password, $gender, $email, 
                  $specialty, $address, $contact);

            $successmess="Registration Confirmed";
        echo "<script>setTimeout(\"location.href = 'admin-add-new-doctor.php';\",1500);</script>";

        }
    }
?>

<?php 

     function firstnameValidation(){
    global $firstname,$firstnameErr;
    $firstname=$_POST['firstname'];
    if($firstname==""){
      $firstnameErr="Frist Required";
      return false;
    }
    else{
      if(preg_match("/^[a-zA-Z. ]*$/",$firstname)){
        return true;
      }
      else{
        $firstnameErr="Invalid Name";
        return false;
      }
      
    }
  }

       function lastnameValidation(){
    global $lastname,$lastnameErr;
    $lastname=$_POST['lastname'];
    if($lastname==""){
      $lastnameErr="Last Required";
      return false;
    }
    else{
      if(preg_match("/^[a-zA-Z. ]*$/",$lastname)){
        return true;
      }
      else{
        $lastnameErr="Invalid Name";
        return false;
      }
      
    }
  }

     function usernameValidation(){
    global $username,$usernameErr;
    $username=$_POST['username'];
    if($username==""){
      $usernameErr="Username Required";
      return false;
    }
    else{
      if(preg_match("/^[a-zA-Z. ]*$/",$username)){
        return true;
      }
      else{
        $usernameErr="Invalid Username";
        return false;
      }      
    }
  }

  //method for password validation
  function passwordValidation(){
    global $passwordErr;
    $password=$_POST['password'];
    if($password==""){
      $passwordErr="Password Required";
      return false;
    }
    else{
      if(strlen($password)>=5){
        if(preg_match("(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$)",$password)){
          return true;
        }
        else{
          $passwordErr="Password should contain 1 uppercase 1 lowercase 1 digit";
          return false;
        }
      }
      else{
        $passwordErr="Password length should be 5 character";
        return false;
      }
    }
  }


         function re_passValidation(){
    global $re_passwordErr;
    $re_password=$_POST['re_password'];
    if($re_password==""){
      $re_passwordErr="Confirm password Required";
      return false;
    }
    else{
      $password=$_POST['password'];
      if($password==$re_password){
        return true;
      }
      else{
        $re_passwordErr="Password And Confirm password not matched";
        return false;
      }
    }

  }

   //method for mail validation
  function emailValidation(){
    global $email,$emailErr;
    $email=$_POST['email'];
    if($email==""){
      $emailErr="Email Required";
      return false;
    }
    else{
      if(preg_match("/^[a-z][a-zA-Z_0-9]*@[a-zA-Z]*\.[a-z]{2,6}$/",$email)){
        return true;
      }
      else{
        $emailErr="Invalid Email";
        return false;
      }
    }
  }


  //method for addess validation 
  function addressValidation(){
    global $address,$addressErr;
    $address=$_POST['address'];
    if($address==""){
      $addressErr="Address Required";
      return false;
    }
    else{
      return true;
    }
  }


  //method for contact no validation
  function contactValidation(){
    global $contact,$contactErr;
    $contact=$_POST['contact'];
    if($contact==""){
      $contactErr="Phone No Required";
      return false;
    }
    else{
      if(preg_match("/^[0-9]{1,12}$/",$contact)){
        return true;
      }
      else{
        $contactErr="Please Check Phone No";
        return false;
      }
    }
  }
 

?>