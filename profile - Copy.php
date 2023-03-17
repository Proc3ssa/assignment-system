<!DOCTYPE html>
<html>
<head>
	<?php
	$connection = mysqli_connect("localhost","root","*126*mysql#","philemon");
	$index_number = $_POST['index_number'];
  $selectprime = "SELECT *from users WHERE index_number = '$index_number'";
	$primequery = mysqli_query($connection,$selectprime);
	$primeresults =mysqli_fetch_assoc($primequery);
	echo '
	<title>'.$primeresults['name'].'</title>
</head>
<body>

	<header>


		<nav>
			<ul>
				<li><a href="index.html>">Log out</a></li>
				<li><a href="editprofile.php>">Edit Profile</a></li>

			</ul>
		</nav>

		<div class="profile">
			<div class="img"></div>

			<h5>'.$primeresults['name'].'</h5>
		</div>

	</header>

	<section>
		<h1 style="color: blue">Profile</h1>
		<div class="profilepicture"></div>
		<h2 align="center">'.$primeresults['name'].'</h2>

		<table border="1">
			 <tr>

			 	<th>Index number</th>
			 	<th>Email</th>

			 </tr>
			 <tr>

			 	<td>'.$primeresults['index_number'].'</td>
			 	<td>'.$primeresults['email'].'</td>

			 </tr>
		</table>

	</section>

	<footer>
		<p>asarephilemon&copy;2021</p>
	</footer>

</body>

<style>
	body{
		margin:0px;
		background:-webkit-linear-gradient(rgb(0,0,0,0.5),rgb(0,0,0,0.5));
	}

	header{
		background-color: rgba(0,50,40);
		color: white;
		padding: 10px;
		height: fit-content;
		border-bottom: 3px solid blue;


	}
	.profile{
		text-align: center;
		width: fit-content;
		margin-right: 10px;

	}
	.img{
		border:3px solid blue;
		width: 70px;
		height:70px;
		border-radius: 360px;
		background-image:url(./'.$primeresults['img_link'].');
		background-repeat:round;
		margin-left: auto;
		margin-right: auto;
	}
	nav{

		width: fit-content;
		float: right;
		margin-right: 10px;
		margin-top: 30px;

	}
	li{
		list-style-type: none;
		display: inline;
		padding: 10px;
	}
	a{
		text-decoration: none;
		color:white;
	}
	section{
		border:1px solid white;
		border-radius: 10px;
		width:fit-content;
		background-color: white;
		margin:4cm auto 4cm;
		padding: 30px;

	}
	.profilepicture{
		width:2.5cm;
		height: 2.5cm;
		border:2px solid black;
		border-radius: 360px;
		margin-right: auto;
		margin-left: auto;
		background-image:url(./'.$primeresults['img_link'].');
		background-repeat:round;
	}


	footer{
		text-align: center;
		background-color: rgba(0,70,60);
		color:white;
		padding:30px;

	}
	';
	?>
</style>
</html>
