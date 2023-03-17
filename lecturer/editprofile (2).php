<!DOCTYPE html>
<html>
<head>
	<title>user</title>
</head>
<body>

	<header>
		

		<nav>
			<ul>
				<li><a href="index.html>">Log out</a></li>
				<li><a href="profile.html">Profile</a></li>
				
			</ul>
		</nav>

		<div class="profile">
			<div class="img"></div>

			<h5>Asare Philemon |<span>Lecturer</span></h5>
		</div>

	</header>
	
	<section>
		<h1 style="color: blue">Edit Profile</h1>
		<div class="edit">
			<table>
		  <form action="profile.php" method="post">
		  	<tr><p>
		  		<td>Name</td> <td><input type="text" name="name" value="asare philemon" required=""></td>
		  	</p>
		  </tr>
 
		  	<tr><p>
		  		<td>Password</td> <td><input type="password" name="password" value="051899994" required=""></td>
		  	</p>
		  </tr>

		  	
		  		<tr><p>
		  		<td>Email</td> <td><input type="email" name="email" value="asare@gmail.com" required=""></td>
		  	</p>
		  </tr>
		  	

		  
		  </table>
		  <div class="button"><button type="submit">Finish</button></div>
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
	section{
		border:1px solid white;
		border-radius: 10px;
		width:fit-content;
		background-color: white;
		margin:4cm auto 4cm;
		padding: 30px;

	}
	.edit{
		width:fit-content;
		margin-right: auto;
		margin-left: auto;
	}
	td{
		padding:10px;
		font-size: 20px;
		font-weight: bolder;
	}
	.button{
		width: fit-content;
		margin: 10px auto 9px;
		
	}
	.button button{
		color: white;
		background-color: rgb(8,90,100);
		border-radius: 5px;
		border:none;
		width: 80px;
		height: 30px;

	}
	header span{
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