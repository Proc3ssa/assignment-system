<!DOCTYPE html>
<html>
<head>
 <title>password reset</title>
</head>
<body>

 <header>


   <nav>
     <ul>

     </ul>
   </nav>




 </header>

 <section>
   <h3>Password reset</h3>
   <div class="right">

      <form action="forgottenpassword.php" method="post" enctype="multipart/form-data">
        <p style="font-weight: bolder;">Email address</p>
        <input type="mail" name="email" value="" required="" placeholder="type anything here for the mean time">

        <p>
         <p style="font-weight: bolder; color:black;">A code has been sent to your mail enter code</p>
         <input type="text" name="code" placeholder="" required="enter work title">
        </p>

          <p>

            <button type="submit" name="submit">verify</button>
      </form>
   </div>
   <div class="left">

   </div>
 </section>

 <footer>
   <p>asarephilemon&copy;2021</p>
 </footer>

</body>

<?php
if(isset($_POST['submit'])){
$connection = mysqli_connect("localhost","root","*126*mysql#","philemon");
$mail = $_POST["email"];
$code =$_POST["code"];
$select1 = 'SELECT email FROM users where email = ? Limit 1';
$select2 = 'SELECT *from mailer';
$stmt=$connection->prepare($select1);
$stmt->bind_param("s",$mail);
$stmt->execute();
$stmt->bind_result($mail);
$stmt->store_result();
$id=$stmt->num_rows;
if( $id !=0){
     $query = mysqli_query($connection, $select2);
     $codec = mysqli_fetch_assoc($query);
     
       if(mail("$mail","Password reset","$codec['code']","assignmentworks@gmail.com")){
         $delete = 'DELETE from mailer where code = "'.$codec.'"';
         $delquery = mysqli_query($connection, $delete);


       }
       else{
         echo "
				 <script>
							 alert('message senginh failed');
				 </script>
			";
       }

     }
}

else{
  echo "
				 <script>
							 alert('no account with that email');
				 </script>
			";
  }

?>

<style>
 body{
   margin:0px;
   background: linear-gradient(rgba(0, 0, 0, 0.774),rgba(0, 0, 0, 0.753)), url("./image/back.svg");;
 }

 header{
   background-color: rgba(0,50,40);
   color: white;
   padding: 10px;
   height: fit-content;
   border-bottom: 3px solid blue;


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
