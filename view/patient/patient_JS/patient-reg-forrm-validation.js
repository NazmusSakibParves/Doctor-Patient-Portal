
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