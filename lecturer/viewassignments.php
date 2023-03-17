<!DOCTYPE html>
<html>
<head>
	<title>Lecturer</title>
</head>
<body>
	<?php
		$connection = mysqli_connect("localhost","root","*126*mysql#","philemon");
	     $idnumber = $_POST["id"];
			 $selecta = "SELECT *FROM users where index_number = '$idnumber'";
			 $selectsub = "SELECT *FROM submissions";
			 $query = mysqli_query($connection,$selecta);
			 $querysub = mysqli_query($connection,$selectsub);
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
	    <button  type="submit" name ="ua">Upload assignment</button>
			<button id="lecture" type="submit" name="un">Upload Notes</button>
			<button id="active" type="button" name="va">View Assignments</button>
			<button id="assessment" type="submit" name="as">Assess students</button></a>
			<button type="submit" name="ib">information board</button>
		</form>
	</div>
    </aside>

	<section>
	    <h1 align="center"> Assignments</h1>
		<div class="list">
			<table>
				<?php
				echo"
				<table>
							<tr>
									<th>Index number</th>
									<th>Submission Date</th>
									<th>Course</th>
									<th>Assignment code</th>
							</tr>";
       while( $subresult = mysqli_fetch_assoc($querysub)){
           echo'
					 <tr>
							 <td>'.$subresult['index_number'].'</td>
							 <td>'.$subresult['submission_date'].'</td>
							 <td>'.$subresult['course'].'</td>
							 <td>'.$subresult['asscode'].'</td>
							 <td><a href="../'.$subresult['link'].'"><button>View</button></td>
					 </tr>

					 ';
			 }
			 	echo' </table>';
			?>

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
	border-radius: 10px;
	margin:30px auto 30px;

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
    .list{
    	width: fit-content;
    	margin:10px auto 10px;
    }

	button:hover{
		border: 1px solid blue;
		background-color: cyan;
		color:black ;
		padding:18px;
		box-shadow: 2px 4px 7px gray;
	}
	span{
		color: yellow;
	}
	th{
		padding: 10px;
		text-align: left;
		background-color: rgba(40 70 87);
		color:white;
	}
	td{
		text-align: center;
	}
	b{
		color: blue;
	}
	b span{
		color: red;
	}
	footer{
		text-align: center;
		background-color: rgba(0,70,60);
		color:white;
		padding:30px;
	}
</style>
</html>
