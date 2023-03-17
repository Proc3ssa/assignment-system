<!DOCTYPE html>
<html>
<head>
	<title>Lecturer</title>
</head>
<body>
	<?php
	$connection = mysqli_connect("localhost","root","*126*mysql#","philemon");
     $idnumber = $_POST["id"];
		 $selecta = "SELECT *FROM lecturer where id = '$idnumber'";
		 $query = mysqli_query($connection,$selecta);
		 $result = mysqli_fetch_assoc($query);

	 ?>

	<header>


		<nav>
			<ul>
				<li><a href="index.html"><button  id="nav">Log out</button></a></li>
				<form action="director1.php" method="post">
					<?php echo'<input type="text" name="id" value="'.$idnumber.'" style="visibility:hidden" required>' ?>
				<li><button type="submit" name="submit1">Profile</button></li>
				<li><button type="submit" name="submit2">Edit Profile</button></li>
				</form>
			</ul>
		</nav>

		<div class="profile">
			<div class="img"></div>

   <?php
		echo '	<h5>'.$result["name"].' ';
			?>
				| <span>Lecturer</span></h5>
		</div>

	</header>
	<aside>
	<div class="buttons">
<form action="director2.php" method="post">
     	<?php
			echo'<input type="text" name="id" value="'.$idnumber.'" style="visibility:hidden;">';
			 ?>
    <button id="active" type="button">Upload assignment</button>
		<button id="lecture" type="submit" name="un">Upload Notes</button>
		<button id="assignments" type="submit" name="va">View Assignments</button>
		<button id="assessment" type="submit" name="as">Assess students</button></a>
		<button type="submit" name="ib">information board</button>
	</form>



	</div>
    </aside>


	<section>
	    <h1 align="center">Upload Assignment</h1>
		<div class="form">
			<form action="lecturerupload.php" method="post" enctype="multipart/form-data">
				<table>
					<tr>
						<th>Assignment title</th>
						<th>CODE</th>
						<th>Deadline</th>
					</tr>
					<tr>
						<td><input type="text" name="assignmentname" required=""></td>
						<td><input type="text" name="assignmentcode" required=""></td>
						<td><input type="date" name="deadline" required=""></td>
						<?php
						echo '<td style="display:none"><input type="text" name="lecturer" required="" value="'.$result['id'].'"></td>';
						?>
					</tr>
				</table>
				<b>Assignment</b> <input type="file" name="file" required="">
				<button type="submit" name="upload" id="upload">Upload</button>
			</form>
		</div>

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
	  margin-left: auto;
		margin-right: auto;
		<?php
				echo 'background-image:url("../'.$result["img_link"].'");
				background-repeat:round;';

		 ?>
	}
	nav{

		width: fit-content;
		float: right;
		margin-right: 10px;
		margin-top: 30px;

	}
	#nav{
		position:relative;
		top:45px;
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
		width:80%;
		background-color: white;
		border-radius: 10px;
		margin:20px auto 20px;
		padding: 20px;


	}
	aside{
		background-color: white;
		width: auto;
	}
	.buttons{
		width:fit-content;
		padding: 40px;
		margin-right: auto;
		margin-left: auto;
		padding-bottom: 20px;
		background-color: white;
	}

	button{
		padding:10px;
		margin-left: 20px;
		width: 150px;
		border-radius: 5px;
		border:none;
		margin-top: 10px;
		color: white;
		background-color: rgba(90,70,80);
    }
    #upload{
    	width: 150px;
    	height: 35px;
    	background-color: rgba(0,70,200);
    	color: white;
    }
    #active{
    	padding:10px;
		margin-left: 20px;
		width: 150px;
		border-radius: 5px;
		border:none;
		margin-top: 10px;
		color: white;
		background-color: rgba(0,70,80);
    }

	button:hover{
		border: 1px solid blue;
		background-color: cyan;
		color:black ;
		padding:18px;
		box-shadow: 2px 4px 7px gray;
	}
	.form{

		width: fit-content;
		margin-right: auto;
		margin-left: auto;
		margin-top: 20px;
	}

	th{
		text-align: left;
	}
	input[type='file']{
		margin-top: 20px;
	}
	span{
		color: yellow;
	}
	footer{
		text-align: center;
		background-color: rgba(0,70,60);
		color:white;
		padding:30px;
	}
</style>
</html>
