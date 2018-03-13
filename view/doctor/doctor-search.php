<?php include_once('session-active.php'); ?>
<!--dashboard options -->
<?php include("doctordashboard.php");?>

<?php include("../../service/doctor_service.php");?>
<title>index</title>
<style>
input[type=text] {
    width: 120px;
    box-sizing: border-box;
    border: 1px solid #999;
    border-radius: 4px;
    font-size: 14px;
    background-color: white;
    background-image: url('img/search.png');
    background-position: 10px 10px;
    background-repeat: no-repeat;
    padding: 8px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 50%;
}
input[type=submit] {
    width: 12%;
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    margin: 8px 0;
	margin-left:8px;
	margin-top:4px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

select {
    width: 100%;
    padding: 8px 20px;
    margin: 2px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
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

	<hr/>
	<div id="main" align="center">
      <div id="donnarsearch">
       <h3 style="color:blue;">SEARCH </h3>
       <hr style="color:red" />
       </div>
     </div>

	<div id="main" align="center">
      <div id="searchdonardiv">
          
        <form method="post" action="doctor-search.php">
             </div>
                    <div style="width:250px">
                    <br/>
                            <label>Search Category</label>
                                <select id="searchcategory" name="searchcategory">
                                  <option>By Patient ID</option>
                                   <option>Donor By anything</option>
                                </select>
                     </div><br/>

            Search &nbsp;<input type="text" name="searchbox" placeholder="Search..">
            
			<input type="submit" value="Search">

            

        </form>
       <br/>

     </div>

     <!--Show the search result -->
  <?php

      if($_SERVER['REQUEST_METHOD']=='POST'){
          $category=$_POST['searchcategory'];
          $searchtext=$_POST['searchbox'];

          //find doctor id 
            $username=$_SESSION['Duser_name'];
            $res = get_doctor_profile($username);
            $drow = mysqli_fetch_assoc($res);
            $dcotor_id = $drow['id'];


          //search patient by patient id 
          if($category=="By Patient ID"){
            if(!empty($searchtext)){
            $result=search_patient_by_doctor_id($searchtext,$dcotor_id);
            if(mysqli_num_rows($result) > 0){

              echo '<br/>';
            echo '<div align="center">
                <label style="color:blue">Search Result</label>
            </div><br/>';
              echo '<div align="center"><label style="color:blue">Treatment History</label></div>';
              echo '<br/>';
  echo '<table  style="border-collapse: collapse; width: 100%;">';
  echo '<tr id="maintr">
        <td id="maintd">Patient ID</td>
        <td id="maintd">Doctor ID</td>
        <td id="maintd">Treatment For</td>
        <td id="maintd">Treatment</td>
        <td id="maintd">Note</td>
        <td id="maintd">Date Time</td>
      </tr>';   
  while($row = mysqli_fetch_assoc($result)){        
      echo '<tr id="datatr">
        <td id="datatd">'.$row['patient_id'].'</td>
        <td id="datatd">'.$row['doctor_id'].'</td>
        <td id="datatd">'.$row['treatment_for'].'</td>
        <td id="datatd">'.$row['treatment'].'</td>
        <td id="datatd">'.$row['note'].'</td>
        <td id="datatd">'.$row['created_at'].'</td>
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
 else{
    echo '<div align="center">
         <p style="color:red">Input Patient ID</p>
    </div>'  ;
 }

    }

      if($category=="Donor By anything"){

          $result = search_donar($searchtext,$searchtext,$searchtext,$searchtext);
          if(mysqli_num_rows($result) > 0){ 
            echo '<br/>';
            echo '<div align="center">
                <label style="color:blue">Search Result</label>
            </div><br/>';
  
  echo '<table  style="border-collapse: collapse; width: 100%;">';
  echo '<tr id="maintr">
        <td id="maintd">Full name</td>
        <td id="maintd">Gender</td>
        <td id="maintd">E-Mail</td>
        <td id="maintd">Blood group</td>
        <td id="maintd">Donated organ</td>
        <td id="maintd">Address</td>
        <td id="maintd">Contact No</td>
      </tr>';   
  while($row = mysqli_fetch_assoc($result)){      
      echo '<tr id="datatr">
        <td id="datatd">'.$row['name'].'</td>
        <td id="datatd">'.$row['gender'].'</td>
        <td id="datatd">'.$row['email'].'</td>
        <td id="datatd">'.$row['blood_group'].'</td>
        <td id="datatd">'.$row['organname'].'</td>
        <td id="datatd">'.$row['address'].'</td>
        <td id="datatd">'.$row['contact_no'].'</td>
      </tr>';   
  }
  echo '</table>';
  }
  else{
    echo '<p style="color:red">No data found</p>';
  }
      }
     
    }

?>





<!--Bottom options -->
<?php include("bottomfotor.php");?>