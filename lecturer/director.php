<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>direct</title>
  </head>
  <body>

    <div class="div">
      <?php
          $idnumber = $_POST["id"];
          $password = $_POST["password"];

          if (isset($_POST['submit'])){
             $connection = mysqli_connect("localhost","root","*126*mysql#","philemon");
             if($connection){

                $selectprime = 'SELECT *from lecturer WHERE id = "'.$idnumber.'"';




                 $select = 'SELECT id from lecturer where id =? Limit 1';
                 $selectp = 'SELECT password from lecturer where id = "'.$idnumber.'";';

                 $stmt=$connection->prepare($select);
                 $stmt->bind_param("s",$idnumber);
                 $stmt->execute();
                 $stmt->bind_result($idnumber);
                 $stmt->store_result();
                 $id=$stmt->num_rows;

                 if($id!=0){
                 $passquery = mysqli_query($connection,$selectp);
                 $fetch = mysqli_fetch_assoc($passquery);
                 $databasepasword = $fetch['password'];

                 $primequery = mysqli_query($connection,$selectprime);
                 $primeresults =mysqli_fetch_assoc($primequery);

                 if($password == $databasepasword){
                   echo'
                      <form action="lecturer.php" method="post">
                        <input type= "text" name="id" value="'.$idnumber.'" required style="visibility:hidden">
                        <h2 align="center">Verification ok, good to go</h2>
                        <div class="submit">
                              <button type="submit" name="submit">Next</button>
                        </div>
                      </form>
                   ';


                 }
                 else{
                   echo'
                 <script>
                 alert("wrong password for user");
                 </script>
                 ';
                
                 }

               }

               else{
                 echo'
               <script>
               alert("unknown Id number, try again");
               </script>
               ';

               }

             }

             else{
               echo'
             <script>
             alert("data could not connect to database");
             </script>
             ';
             }

           }


       ?>

    </div>




    <style>
            body{
              background-color: grey;
            }

            .div{
              border:1px solid white;
              width:80%;
              margin:2cm auto 2cm;
              border-radius: 10px;
              padding:20px;
            }
            .submit{
              width:fit-content;
              margin:auto;
            }
            button{
              width:70px;
              border:none;
              color:white;
              background-color:green;
              border-radius:5px;
              padding:10px;
            }

    </style>
  </body>
</html>
