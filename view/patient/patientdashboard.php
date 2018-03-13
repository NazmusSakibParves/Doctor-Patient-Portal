<?php include_once('session-active.php'); ?>
<title>index</title>
<style type="text/css">
body{
	background-color: #eee;
}

.profile_option_div{
    background: #004ea8;
    height:40px;
    text-align: right;
    padding: 10px;
    font-family: Helvetica,Arial,sans-serif;
    font-size: 13px;
	position:fixed;
	left:0;
	top:0;
	width:100%;
	z-index: 999;	
}
div a.menu{
	color:#fff;
}
div a.menu:hover{
	color:#000;
}
a{
	text-decoration: none;
	color: blue;
	align: center;
}
a:hover{
	color: #000;
}

div.leftmenu{
	background-color: #eee;
	color : #0572B4;
	float: left;
	width: 15%;
	padding: 5px;
	text-align: center;
	table-layout: inherit;
	text-decoration: none;
	position:fixed;
    border-right: 1px solid #333;
    border-radius: 5px;
	left:0;
	top:80;
}
.tablediv a:hover{
    background-color: #22587D;
    color: #ff9900;
    padding: 5px;
    border-radius: 5px;
}


</style>
	

		<div class="profile_option_div">
		<br/>
			<a href="patienthome.php" style="font-size:22;color:white;position:fixed;left:10%; font-family:none; text-decoration:none;">
			DOCTOR PATIENT PORTAL</a>
			<a class="menu" href="patienthome.php">Home</a>&nbsp;
			<a class="menu" href="patient-profile.php">Profile</a>&nbsp;
			<a class="menu" href="patient-change-password.php">Change Password</a>&nbsp;
			<a class="menu" href="logout.php">Logout</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
		
		</div>

	</div>
	<br/>
	</div>
	

	<div class="optionmenudiv">
		<div class="leftmenu">
			<label style="color:green;font-size:18px;">
			DASHBOARD
			<hr/>
			</label>
		<br/><br/><br/>
			<table class="tablediv">
				<tr>
					<td>
						&nbsp;&nbsp;<img src="img/icon.png" alt="logo">
					</td>
					<td>
						<a href="patient-view-doctor-list.php"> Doctor list</a>
						<hr/>
					</td>
				</tr>

				<tr>
					<td>
						&nbsp;&nbsp;<img src="img/icon.png" alt="logo">
					</td>
					<td>
						<a href="bookappointment.php"> Book appointment</a>
						<hr/>
					</td>
				</tr>
				<tr>
					<td>
						&nbsp;&nbsp;<img src="img/icon.png" alt="logo">
					</td>
					<td>
						<a href="viewappointment.php"> View appointment</a>
						<hr/>
					</td>
				</tr>
				<tr>
					<td>
						&nbsp;&nbsp;<img src="img/icon.png" alt="logo">
					</td>
					<td>
						<a href="patient-cancel-appointment.php"> Cancel appointment</a>
						<hr/>
					</td>
				</tr>
				<tr>
					<td>
						&nbsp;&nbsp;<img src="img/icon.png" alt="logo">
					</td>
					<td>
						<a href="patient-search-doctor.php"> Search doctor</a>
						<hr/>
					</td>
				</tr>
				<tr>
					<td>
						&nbsp;&nbsp;<img src="img/icon.png" alt="logo">
					</td>
					<td>
						<a href="patient-donate-organ.php"> Donate organ</a>
						<hr/>
					</td>
				</tr>
				<tr>
					<td>
						&nbsp;&nbsp;<img src="img/icon.png" alt="logo">
					</td>
					<td>
						<a href="patient-search-donar.php"> Search donar</a>
						<hr/>
					</td>
				</tr>
				<tr>
					<td>
						&nbsp;&nbsp;<img src="img/icon.png" alt="logo">
					</td>
					<td>
						<a href="logout.php"> Logout</a>
						<hr/>
					</td>
				</tr>
			</table>
			<br/><br/>
			
		</div>

	</div>
	
	<div style="background-color: #eee; position :absolute; left :220px; top :80px; width :900px"; border:/>