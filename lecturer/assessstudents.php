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
	    <button  type="submit" name="ua">Upload assignment</button>
			<button id="lecture" type="submit" name="un">Upload Notes</button>
			<button id="assignments" type="submit" name="va">View Assignments</button>
			<button id="active" type="button" name="as">Assess students</button></a>
			<button type="submit" name="ib">information board</button>
		</form>
	</div>
    </aside>

	<section>
	    <h1 align="center">Assess Students</h1>
		<div class="assess">
			<form action="assess.php" method="post">
				<table>
					<tr>
						<th>Student/index number</th>
						<th>Assignment code</th>
						<th>Marks</th>
					</tr>
					<tr>
						<td><input type="text" name="indexnumber" required=""></td>
						<td><input type="text" name="assignmentcode" required=""></td>
						<td><input type="number" name="marks" required="" step="0.5"></td>
					</tr>
				</table>
				<div class="bts">
				<input type="submit" name="submit">
				<input type="reset" name="clear">
				</div>
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
		background-color: white;
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
	#nav{
		position:relative;
		top:45px;
	}
	section{
		width:auto;
		background-color: white;


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
	.assess{
    	width: fit-content;
    	margin:10px auto 10px;
    }
    th{
    	text-align: left;
    }
	span{
		color: yellow;
	}
	.bts{
		width: fit-content;
		margin:10px auto 10px;
		padding: 10px;
	}
	.bts input{
		background-color: blue;
		border:none;
		width:70px;
		height:30px;
		color:white;
		border-radius: 5px;
	}

	footer{
		text-align: center;
		background-color: rgba(0,70,60);
		color:white;
		padding:30px;
	}
</style>
</html>
