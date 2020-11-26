<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Committees</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.srch
		{
			padding-left:1000px;

		}

		body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: white;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
	margin-left: 20px;
}
.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
}
	</style>

</head>
<body>
	<div style="width: 100%; height: 50px; margin-top: -20px;">
	 <div style="background-color: #F44336; padding: 10px; width: 15%; height: 50px; float: left;">
	 	<h3 style="color: white; margin-top: 0px;">Newly Added</h3>
	 </div>	
	  <div style="background-color: #ffcccc; padding: 10px; width: 85%; height: 50px; float: left;">
	 	<h3 style="color: black; margin-top: 0px;">Daily committee thats Ammount is 100 and this will starts from 1st June </h3>
	 </div>

	</div>

	<!--___________________sidenav________________________-->


	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">

                <?php
                if(isset($_SESSION['login_user']))

                { 	echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user']; 
                }
                ?>
            </div><br><br>

 <div class="h"> <a href="committee.php">All Committees</a> </div> 
  <div class="h"> <a href="request.php">Committee Request</a></div>
  <div class="h"> <a href="req.php">Request Information</a></div>
  <div class="h"> <a href="Request_ Status_ Info.php">Request Status Info</a></div>
   <div class="h"><a href="pending.php">Panding Payment List</a></div>
 
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>

	<!--___________________search bar________________________-->

	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="search committees.." required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
	</div>

	
	<h2>List Of Committees</h2>
	<?php

        if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT * from committees where type like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No committee found. Try searching again.";
			}
			else
			{ 
                 
                echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo "Committee_Type";	echo "</th>";
				echo "<th>"; echo "Ammount";  echo "</th>";
				echo "<th>"; echo "Total_Members";  echo "</th>";
				echo "<th>"; echo "Max_Members";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Starting_Date";  echo "</th>";
				echo "<th>"; echo "Drawn_Date";  echo "</th>";
			
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['type']; echo "</td>";
				echo "<td>"; echo $row['amount']; echo "</td>";
				echo "<td>"; echo $row['totalmembers']; echo "</td>";
				echo "<td>"; echo $row['maxmembers']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['startingdate']; echo "</td>";
				echo "<td>"; echo $row['drawndate']; echo "</td>";
				

				echo "</tr>";
			}
		echo "</table>";
			}
		}	
		else{

		$res=mysqli_query($db,"SELECT * FROM `committees` ORDER BY `committees`.`type` ASC;");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo "Committee_Type";	echo "</th>";
				echo "<th>"; echo "Ammount";  echo "</th>";
				echo "<th>"; echo "Total_Members";  echo "</th>";
				echo "<th>"; echo "Max_Members";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Starting_Date";  echo "</th>";
				echo "<th>"; echo "Drawn_Date";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['type']; echo "</td>";
				echo "<td>"; echo $row['amount']; echo "</td>";
				echo "<td>"; echo $row['totalmembers']; echo "</td>";
				echo "<td>"; echo $row['maxmembers']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['startingdate']; echo "</td>";
				echo "<td>"; echo $row['drawndate']; echo "</td>";
				

				echo "</tr>";
			}
		echo "</table>";
	}
	?>
</body>
</html>