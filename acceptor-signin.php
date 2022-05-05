<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Blood Bank </title>
	<img src="picmain/main-logo.png" class="logo">
	<link rel="stylesheet" type="text/css" href="css-main/s44.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Kalam&family=Kaushan+Script&display=swap" rel="stylesheet">
</head>
<body>
	
	<div class="banner-text">
    <div id="header"><h2><a href='index.php'style="text-decoration: none; font-size: 40px; font-family: 'Courier New', Courier, monospace;color:white;">Blood Bank </a></h2></div>
		
		<br><br>
		<p>Acceptor Sign In</p>
		<div class="banner-btn1">
			<section id="login">
				<div class="title-text">
  <div class="" align="center">
  <form action="" method="post">
      <table align="center">
        <tr>
          <td align="center" width="100px" height="50px"><input type="text"name="un" id="aa_id" placeholder="Enter Acceptor ID" style="width: 150px;height: 30px;border: none; border-bottom: 2px solid aqua;"></td>
        </tr>
        <tr>
          <td align="center" width="200px" height="70px"><input type="text"name="ps" placeholder="Enter Password" style="width: 150px;height: 30px;border: none; border-bottom: 2px solid aqua; "></td>
        </tr>
        <div style="position:relative; top: 170px;">
          <input type="submit" name="sub" value="Login" onclick="passvalues();" style="width: 200px; height: 40px; border: none; border-radius: 50px; background: red; " >
</div>
      </table>
      </form>
      <?php
      if(isset($_POST['sub']))
      {
         $un=$_POST['un'];
         $ps=$_POST['ps'];
         $q=$db->prepare("SELECT * FROM acceptor WHERE a_id='$un' && a_pass='$ps'");
         $q->execute();
         $res=$q->fetchAll(PDO::FETCH_OBJ);
         if($res)
         {

          $_SESSION['un']=$un;
           header("Location:acceptor/home-acceptor.php");
         }
         else
         {
           echo "<script>alert('Wrong User')</script>";
         }
      }
        ?>
    </div>
			</section>
			
	</div>
	<div class="banner-btn">
	<div id="sideNav">
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="abt.php">About Us</a></li>
				<li><a href="contact.php">Contact</a></li>
				<li><a href="hospital-list.php">Hospitals</a></li>
				<li><a href="acceptor-signup.php">Sign Up</a></li>
			</ul>
		</nav>
	</div>
</div>
	<div id="menuBtn">
		<img src="images/menu.png" id="menu">
	</div>

	
	<script>

function passvalues()
{
	var firstname=document.getElementById("aa_id").value;
	localStorage.setItem("textvalue", firstname);
	return false;
}
		var menuBtn=document.getElementById("menuBtn")
		var sideNav=document.getElementById("sideNav")
		var menu=document.getElementById("menu")

				menuBtn.onclick=function(){
					if(sideNav.style.right=="-250px"){
						sideNav.style.right="0";
						}
					else{
						sideNav.style.right="-250px";
						
					}
}
	</script>

</body>
</html>
