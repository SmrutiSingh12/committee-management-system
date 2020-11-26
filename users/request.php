<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Committee Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}

		body {
       background-color: #044e42;
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
.committee
{
    width: 400px;
    margin: 0px auto;
}
.form-control
{
  background-color: #080707;
  color: white;
  height: 40px;
}

	</style>

</head>
<body>
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
  
  <span style="font-size:30px;cursor:pointer;color: black;" onclick="openNav()">&#9776; open</span>
  <div class="container" style="text-align: center;">
    <h2 style="color:black; font-family: Lucida Console; text-align: center"><b>Request for Committee</b></h2>
    
    <form class="committee" action="" method="post">
        
        <input type="text" name="type" class="form-control" placeholder="Committee_Type" required=""><br>
        <input type="text" name="amount" class="form-control" placeholder="Ammount" required=""><br>
               
        <button style="text-align: center;" class="btn btn-default" type="submit" name="submit">Request</button>
    </form>
  </div>
<?php
    if(isset($_POST['submit']))
    {
      if(isset($_SESSION['login_user']))
      { 
        $sql1=mysqli_query($db,"SELECT * FROM committees WHERE type='$_POST[type]' and amount='$_POST[amount]';");
         $row1=mysqli_fetch_assoc($sql1) ; 
         $count1=mysqli_num_rows($sql1) ;         
        if($count1!=0)
        {
        mysqli_query($db,"INSERT INTO request_committee VALUES ('$_SESSION[login_user]','$_POST[type]', '$_POST[amount]','','','','') ;");
       ?>
          <script type="text/javascript">
            window.location="req.php"
          </script>
        <?php
      }
      else{
           ?>
        <script type="text/javascript">
             alert("This Type of Committee is not available in Committee List .");
          </script>
           <?php
           }
     }
      else
      {
        ?>
          <script type="text/javascript">
            alert("You need to login first.");
          </script>
        <?php
      }
    }
?>

</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "#044e42";
}
</script>


</body>
</html>