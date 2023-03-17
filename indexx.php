<?php


if (isset($_POST['submit'])){
   $connection = mysqli_connect("localhost","root","*126*mysql#","philemon");
   if($connection){
     $index_number = $_POST['indexnumber'];
      $selectprime = 'SELECT *from users WHERE index_number = "'.$index_number.'"';

       $password = $_POST['password'];


       $select = 'SELECT index_number from users where index_number =? Limit 1';
       $selectp = 'SELECT paswrd from users where index_number = "'.$index_number.'";';

       $stmt=$connection->prepare($select);
       $stmt->bind_param("s",$index_number);
       $stmt->execute();
       $stmt->bind_result($index_number);
       $stmt->store_result();
       $id=$stmt->num_rows;

       if($id!=0){
       $passquery = mysqli_query($connection,$selectp);
       $fetch = mysqli_fetch_assoc($passquery);
       $databasepasword = $fetch['paswrd'];

       $primequery = mysqli_query($connection,$selectprime);
       $primeresults =mysqli_fetch_assoc($primequery);

       if($password == $databasepasword){

        echo'
        <!DOCTYPE html>
        <html>
        <head>
          <title>'.$primeresults["name"].'</title>
        </head>
        <body>

          <header>


            <nav>

            <form action="editprofile.php" method="POST" id="foorm" style="display:right">
            <input type="text" value="'.$index_number.'" name="index_number" id="foorm1">
              <button type="submit" name="submit1" id="foorm2">Edit Profile</button>
            </form>


              <form action="profile.php" method="POST" id="foorm">
              <input type="text" value="'.$index_number.'" name="index_number" id="foorm1">
                <button type="submit" " id="foorm2">Profile</button>
              </form>



            </nav>

            <div class="profile">
              <div class="img"></div>

              <h5>'.$primeresults["name"].'</h5>
            </div>

          </header>

          <section>
            <div class="buttons">
            <form action="indexx.php" method="post">
            <p><input type="text" name="indexnumber" value="'.$primeresults["index_number"].'" style="visibility:hidden">
            </p>
            <button type ="submit" id="submit" name="submit1">Submit</button>
            <button type ="submit" id="lecture" name="notes">Lecture Notes</button>
            <button type ="submit" id="assignments" name="assignments">Assignments</button>
            <button type ="submit" id="assessment" name="assessment">Assessment</button>
            <button type ="submit" id="view" name="submissions">View submissions</button>
            <button type ="submit" id="discussion" name="information">information board</button>
            <form>
            </div>
          </section>

          <footer>
            <p>asarephilemon&copy;2021</p>
          </footer>

        </body>

        <style>
          body{
            margin:0px;
            background: linear-gradient(rgba(0, 0, 0, 0.774),rgba(0, 0, 0, 0.753)), url("./images/back.svg");
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
            background-image:url(./'.$primeresults["img_link"].');
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
          #foorm #foorm1{
            visibility:hidden;
          }
          #foorm2{
            background-color:transparent;
            border:none;
            color:white;
          }

          a{
            text-decoration: none;
            color:white;
          }
          section{
            border:1px solid white;
            border-radius: 10px;
            width:70%;
            background-color: white;
            margin:4cm auto 4cm;
            padding: 90px;

          }
          .buttons{
            width:fit-content;
            margin-left: auto;
            margin-right: auto;
          }
          button{
            padding:10px;
            margin-left: 20px;
            width: 150px;
            border-radius: 5px;
            border:none;
            margin-top: 10px;
            }
          #submit{
            background-color: blue;
            color:white;
          }
          #lecture{
            background-color: violet;
            color:white ;
          }
          #assignments{
            background-color: white;
            color:black ;
            border: 1px solid black;
          }
          #view{
            background-color: green;
            color:white;

          }
          #assessment{
            background-color: yellow;
            color:blue ;
          }
          #discussion{
            background-color: rgba(10,20,30);
            color:white ;
          }

          #submit:hover{
            background-color: yellow;
            color:black;
            padding:18px;
            box-shadow: 2px 4px 7px gray;
          }
          #lecture:hover{
            background-color: green;
            color:white ;
            padding:18px;
            box-shadow: 2px 4px 7px gray;
          }
          #view:hover{
            background-color: violet;
            color:white ;
            padding:18px;
            box-shadow: 2px 4px 7px gray;
          }
          #assessment:hover{
            background-color: black;
            color:white ;
            padding:18px;
            box-shadow: 2px 4px 7px gray;
          }
          #discussion:hover{
            background-color: blue;
            color:white ;
            padding:18px;
            box-shadow: 2px 4px 7px gray;
          }
          #assignments:hover{
            background-color: cyan;
            color:black ;
            padding:18px;
            box-shadow: 2px 4px 7px gray;
          }
          footer{
            text-align: center;
            background-color: rgba(0,70,60);
            color:white;
            padding:30px;
          }
        </style>
        </html>

        ';


       }
       else{
       echo "
          <script>
                alert('Wrong password');
          </script>
       ";
       }
     }

     else{
       echo "
          <script>
                alert('unknown index number');
          </script>
       ";
     }

   }

   else{
     echo'  <script>
         alert("error connecting to server");
       </script>
       ';
   }
 }

 if (isset($_POST['submit1'])){
   $index_number = $_POST['indexnumber'];
   $selectprime = 'SELECT *from users WHERE index_number = "'.$index_number.'"';
   $connection = mysqli_connect("localhost","root","*126*mysql#","philemon");
   $primequery = mysqli_query($connection,$selectprime);
   $primeresults =mysqli_fetch_assoc($primequery);
echo '
<!DOCTYPE html>
<html>
<head>
 <title>submit</title>
</head>
<body>

 <header>


   <nav>
     <ul>

     </ul>
   </nav>

   <div class="profile">
     <div class="img"></div>

     <h5>'.$primeresults["name"].'</h5>
   </div>

 </header>

 <section>
   <h3>Submit</h3>
   <div class="right">

      <form action="submit.php" method="post" enctype="multipart/form-data">
        <p style="font-weight: bolder;">Work type</p>
        Assignment <input type="radio" name="worktype" value="assignment" required="Select work type">
        Project work <input type="radio" name="worktype" value="project" required="Select work type">
        <p>
         <a style="font-weight: bolder; color:black;">Assignment/Project code</a>
         <input type="text" name="code" placeholder="eg ASMT221" required="enter work title">
        </p>

          <p>
         <b>File(.docx files only)</b>
         <input type="file" name="file" required="">
            </p>
        <input type="text" name="indexnumber" value="'.$primeresults["index_number"].'" required style="visibility:hidden;">
            <button type="submit" name="submit">Submit work</button>
      </form>
   </div>
   <div class="left">

   </div>
 </section>

 <footer>
   <p>asarephilemon&copy;2021</p>
 </footer>

</body>

<style>
 body{
   margin:0px;
   background: linear-gradient(rgba(0, 0, 0, 0.774),rgba(0, 0, 0, 0.753)), url("./images/back.svg");
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
   background-image: url("./'.$primeresults["img_link"].'");
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
   width:70%;
   background-color: white;
   margin:4cm auto 4cm;
   padding: 30px;

 }
 .right{
   float: right;
   font-size: 15px;


 }
 .left{
   border:1px solid black;
   width: 50%;
   height:200px;
   border-left-color: transparent;
   border-top-color: transparent;
   border-bottom-color: transparent;
 }

 footer{
   text-align: center;
   background-color: rgba(0,70,60);
   color:white;
   padding:30px;
 }
 section h3{
       color: blue;
       font-size: 30px;
 }
 .right button{
         border:none;
         background-color: rgb(8,90,100);
         color:white;
         padding: 10px;
 }
</style>
</html>

';

 }


 if (isset($_POST['notes'])){
   $index_number = $_POST['indexnumber'];
   $selectprime = 'SELECT *from users WHERE index_number = "'.$index_number.'"';
   $select = "SELECT *FROM notes";
   $connection = mysqli_connect("localhost","root","*126*mysql#","philemon");
   $primequery = mysqli_query($connection,$selectprime);
   $primeresults =mysqli_fetch_assoc($primequery);

   $selectquery = mysqli_query($connection,$select);

   echo '
   <!DOCTYPE html>
   <html>
   <head>
     <title>user</title>
   </head>
   <body>

     <header>


       <nav>

       </nav>

       <div class="profile">
         <div class="img"></div>

         <h5>'.$primeresults["name"].'</h5>
       </div>

     </header>

     <section>
       <h2 style="color: blue;">Notes</h2>
       <div class="notes">
         <table>
     <tr>
         <th>Course</th>
         <th>uploaded date</th>

     </tr>
         ';

         while($selectresults =mysqli_fetch_assoc($selectquery)){
          echo'
           <tr>
             <td>'.$selectresults["course"].'</td>
             <td>'.$selectresults["uploaded_date"].'</td>
             <td><a href="/lecturer/'.$selectresults["link"].'"><button>download</button></a></td>
           </tr>';
         }
           echo'
         </table>

       </div>
     </section>

     <footer>
       <p>asarephilemon&copy;2021</p>
     </footer>

   </body>

   <style>
     body{
       margin:0px;
       background: linear-gradient(rgba(0, 0, 0, 0.774),rgba(0, 0, 0, 0.753)), url("./images/back.svg");
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
       background-image:url("./'.$primeresults["img_link"].'");
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
     nav a{
       text-decoration: none;
       color:white;
     }
     section{
       border:1px solid white;
       border-radius: 10px;
       width:70%;
       background-color: white;
       margin:4cm auto 4cm;
       padding: 90px;

     }
     td{
       font-weight: bolder;
       padding:5px;
     }
     th{
       color:red;
       text-align:left;
     }
     .notes{
       width: fit-content;
       margin: 2px auto 3px;
     }

     footer{
       text-align: center;
       background-color: rgba(0,70,60);
       color:white;
       padding:30px;
     }
   </style>
   </html>
   ';
}


if (isset($_POST['assignments'])){

  $index_number = $_POST['indexnumber'];
  $selectprime = 'SELECT *from users WHERE index_number = "'.$index_number.'"';
  $select = 'SELECT *FROM assignments';
  $connection = mysqli_connect("localhost","root","*126*mysql#","philemon");
  $primequery = mysqli_query($connection,$selectprime);
  $primeresults =mysqli_fetch_assoc($primequery);
  $selectquery = mysqli_query($connection,$select);
  echo '
  <!DOCTYPE html>
  <html>
  <head>
   <title>user</title>
  </head>
  <body>

   <header>


     <nav>

     </nav>

     <div class="profile">
       <div class="img"></div>

       <h5>'.$primeresults["name"].'</h5>
     </div>

   </header>

   <section>
     <h2 style="color: blue;">Assignments</h2>
     <div class="notes">
       <table>
         <tr>
           <th>Deadline</th>
           <th>Code</th>
           <th>Name</th>

         </tr>';

        while($selectresults =mysqli_fetch_assoc($selectquery)){
       echo'
         <tr>
           <td>'.$selectresults["deadline"].'</td>
           <td>'.$selectresults["asscode"].'</td>
           <td>'.$selectresults["title"].'</td>
           <td><a href="lecturer/'.$selectresults["link"].'"><button>download</button></a></td>
         </tr>
         ';
       }
        echo '
       </table>

     </div>
   </section>

   <footer>
     <p>asarephilemon&copy;2021</p>
   </footer>

  </body>

  <style>
   body{
     margin:0px;
    background: linear-gradient(rgba(0, 0, 0, 0.774),rgba(0, 0, 0, 0.753)), url("./images/back.svg");
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
     background-image:url("'.$primeresults["img_link"].'");
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
   nav a{
     text-decoration: none;
     color:white;
   }
   section{
     border:1px solid white;
     border-radius: 10px;
     width:70%;
     background-color: white;
     margin:4cm auto 4cm;
     padding: 90px;

   }
   th{
     background-color:  rgba(200 240 250);
   }
   td{
     font-weight: bolder;
     padding:5px;
   }
   .notes{
     width: fit-content;
     margin: 2px auto 3px;
   }

   footer{
     text-align: center;
     background-color: rgba(0,70,60);
     color:white;
     padding:30px;
   }
  </style>
  </html>
  ';
}


if (isset($_POST['assessment'])){
  $index_number = $_POST['indexnumber'];
  $selectprime = 'SELECT *from users WHERE index_number = "'.$index_number.'"';
  $select = 'SELECT *FROM assessment where index_number = "'.$index_number.'"';
  $connection = mysqli_connect("localhost","root","*126*mysql#","philemon");
  $primequery = mysqli_query($connection,$selectprime);
  $primeresults =mysqli_fetch_assoc($primequery);
  $selectquery = mysqli_query($connection,$select);
  echo '
  <!DOCTYPE html>
  <html>
  <head>
  	<title>user</title>
  </head>
  <body>

  	<header>


  		<nav>

  		</nav>

  		<div class="profile">
  			<div class="img"></div>

  			<h5>'.$primeresults["name"].'</h5>
  		</div>

  	</header>

  	<section>
  		<h2 style="color: blue;">Assessment</h2>
  		<div class="notes">
  			<table>
  				<tr>
  					<th>Subject</th>
  					<th>Code</th>
  					<th>Mark</th>
  				</tr>';

        while ($selectresults = mysqli_fetch_assoc($selectquery)) {
          echo'
        	<tr>
  					<td>'.$selectresults["course"].'</td>
  					<td>'.$selectresults["asscode"].'</td>
  					<td>'.$selectresults["mark"].'%</td>
  				</tr>
          ';
        }

  				echo'
  			</table>

  		</div>
  	</section>

  	<footer>
  		<p>asarephilemon&copy;2021</p>
  	</footer>

  </body>

  <style>
  	body{
  		margin:0px;
  	background: linear-gradient(rgba(0, 0, 0, 0.774),rgba(0, 0, 0, 0.753)), url("./images/back.svg");
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
  		background-image:url("./'.$primeresults["img_link"].'");
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
  	nav a{
  		text-decoration: none;
  		color:white;
  	}
  	section{
  		border:1px solid white;
  		border-radius: 10px;
  		width:70%;
  		background-color: white;
  		margin:4cm auto 4cm;
  		padding: 70px;

  	}
  	td{
  		font-weight: bolder;
  		padding:5px;
  	}
  	.notes{
  		width: fit-content;
  		margin: 2px auto 3px;
  	}

  	th{
  		background-color: rgba(0,70,60);
  		color:white;
  		padding:10px;
  	}

  	footer{
  		text-align: center;
  		background-color: rgba(0,70,60);
  		color:white;
  		padding:30px;
  	}
  </style>
  </html>
  ';
}

if (isset($_POST['submissions'])){
  $index_number = $_POST['indexnumber'];
$selectprime = 'SELECT *from users WHERE index_number = "'.$index_number.'"';
$select = 'SELECT *FROM submissions where index_number = "'.$index_number.'"';
$connection = mysqli_connect("localhost","root","*126*mysql#","philemon");
$primequery = mysqli_query($connection,$selectprime);
$primeresults =mysqli_fetch_assoc($primequery);
$selectquery = mysqli_query($connection,$select);
  echo '
  <!DOCTYPE html>
  <html>
  <head>
  	<title>user</title>
  </head>
  <body>

  	<header>


  		<nav>

  		</nav>

  		<div class="profile">
  			<div class="img"></div>

  			<h5>'.$primeresults["name"].'</h5>
  		</div>

  	</header>

  	<section>
  		<h2 style="color: blue;">Submissions</h2>
  		<div class="notes">
  			<table>
     <tr>
        <th>Uploaded date</th>
        <th>Assignment code</th>
        <th>Assignment name</th>
     </tr>
        ';

      while($selectresults = mysqli_fetch_assoc($selectquery)) {
     echo'
        	<tr id="tr1">
  					<td>'.$selectresults["submission_date"].'</td>
            <td>'.$selectresults["asscode"].'</td>
  					<td>'.$selectresults["course"].'</td>
  					<td><a href="submissions/'.$selectresults["link"].'"><button>view</button></a></td>
  				</tr>
          ';
        }
  echo'
  			</table>

  		</div>
  	</section>

  	<footer>
  		<p>asarephilemon&copy;2021</p>
  	</footer>

  </body>

  <style>
  	body{
  		margin:0px;
  		background: linear-gradient(rgba(0, 0, 0, 0.774),rgba(0, 0, 0, 0.753)), url("./images/back.svg");
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
      background-image:url("./'.$primeresults["img_link"].'");
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
  	nav a{
  		text-decoration: none;
  		color:white;
  	}
  	section{
  		border:1px solid white;
  		border-radius: 10px;
  		width:70%;
  		background-color: white;
  		margin:4cm auto 4cm;
  		padding: 90px;

  	}
  	td{
  		font-weight: bolder;
  		padding:5px;
  	}
  	#tr1{
  		background-color: rgba(200 240 250);
  	}

  	#tr2{
  		background-color: rgba(200 200 250);
  	}
  	.notes{
  		width: fit-content;
  		margin: 2px auto 3px;
  	}

  	footer{
  		text-align: center;
  		background-color: rgba(0,70,60);
  		color:white;
  		padding:30px;
  	}
  </style>
  </html>
  ';
}


if (isset($_POST['information'])){
  $index_number = $_POST['indexnumber'];
$selectprime = 'SELECT *from users WHERE index_number = "'.$index_number.'"';
$select = 'SELECT *FROM information';
$connection = mysqli_connect("localhost","root","*126*mysql#","philemon");
$primequery = mysqli_query($connection,$selectprime);
$primeresults =mysqli_fetch_assoc($primequery);
$selectquery = mysqli_query($connection,$select);


    echo'
    <!DOCTYPE html>
    <html>
    <head>
    	<title>information board</title>
    </head>
    <body>

    	<header>


    		<nav>

    		</nav>

    		<div class="profile">
    			<div class="img"></div>

    			<h5> '.$primeresults["name"].'| <span>Student</span></h5>
    		</div>

    	</header>


    	<section>
      <h1 align="center">Information board</h1>';
        while($selectresults = mysqli_fetch_assoc($selectquery)){
          echo'

    	    <div class="information">

    	    	<h1 Title:>'.$selectresults["title"].'</h1>
    	    	<h4>uploaded by: <a>'.$selectresults["lecturer"].'</a></h4>
    	    	<h4>uploaded date: <a>'.$selectresults["uploaded_date"].'</a></h4>
            <h3>Message</h3>
    	    	<p>'.$selectresults["message"].'</p>
            <hr>
    	    </div>
          ';
        }

  echo'
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
        background-image:url("./'.$primeresults["img_link"].'");
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
    	.information a{
    		color: blue;
    	}
    	.information{
    		width: 90%;
    		margin:10px auto 10px;
    	}
    	input[type="textarea"]{
    		width: 60%;
    		height: 2cm;
    		margin-left: auto;
    		margin-right: auto;

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
    		width:auto;
    		background-color: white;
    		padding: 20px;


    	}
    	aside{
    		background-color: white;
    		width: auto;
    	}
    	form{
    		margin: 10px auto 10px;
    		width: 90%;


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
    	span{
    		color: yellow;
    	}
    	.chat{
    		border:1px solid black;
    		width:60%;
    		border-radius: 10px;
    		margin:2cm auto 2cm;
    		padding: 10px;
    		background-color: rgba(9,60,60);
    		color: white;

    	}
    	footer{
    		text-align: center;
    		background-color: rgba(0,70,60);
    		color:white;
    		padding:30px;
    	}
    </style>
    </html>
    ';
  } ;

?>
