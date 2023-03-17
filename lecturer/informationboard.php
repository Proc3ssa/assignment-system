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
	    <button  type="submit" name ="ua">Upload assignment</button>
			<button id="lecture" type="submit" name="un">Upload Notes</button>
			<button  type="submit" name="va">View Assignments</button>
			<button id="assessment" type="submit" name="as">Assess students</button></a>
			<button type="button" id="active"name="ib">information board</button>
		</form>
	</div>
    </aside>

	<section>
	    <h1 align="center"> Information Board</h1>
	    <?php
           $select2 = 'SELECT *FROM information';
					 $query2 = mysqli_query($connection,$select2);
					 while($query = mysqli_fetch_assoc($query2)){

					 echo'

 <h1>Title:<a style="color:blue;">'.$query['title'].'</a></h1>
 <h3>By:<a style="color:red;">'.$query['lecturer'].'</a></h3>
 <p>'.$query['message'].'</p>
 <p>Date:<a style="color:red;">'.$query['uploaded_date'].'</a></p>

					 ';

				 }
			 ?>
	</section>

	<section>
		<h1 align="center">Upload message</h1>
    <form action="message.php" method="post">
     <p>Title</p>
		 <input type = "text" name="title">
		 <p>Message</p>
		 <textarea name="message"></textarea>
		 <?php echo'<input type="text" name="who"  value="'.$idnumber.'"required style="visibility:hidden">';?>
		 <p><input type="submit" name="submit" value="send"></p>
		</form>

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
	textarea{
		width:500px;
		height: 200px;
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
	padding: 10px;

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
