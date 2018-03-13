<!--dashboard options -->
<?php include("patientdashboard.php");?>

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
    width: 55%;
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

select {
    width: 100%;
    padding: 8px 20px;
    margin: 2px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
}
</style>

	<hr/>
	<div id="main" align="center">
      <div id="donnarsearch">
       <h3 style="color:blue;">SEARCH DONAR</h3>
       <hr style="color:red" />
       </div>
     </div>

	<div id="main" align="center">
      <div id="searchdonardiv">
          
        <form>
            Search by organ &nbsp;<input type="text" name="searchdonar" placeholder="Search..">
            <br/>

              <div align="center">
                <br/>
                <label style="color:red">OR</label>
                <br/>

              </div>
                    <div style="width:250px">
                    <br/>
                            <label>Search by blood group</label>
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
                     </div>
              

            <div style="width:150px">
                <br/>
                <input type="submit" value="Search">
            </div>

        </form>
       <br/>
       </div>
     </div>

     <!--Show the search result -->

<!--Bottom options -->
<?php include("bottomfotor.php");?>