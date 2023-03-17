<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.svg" type="image/x-icon">
    <title>new account</title>



</head>
<body>

  <?php
  if(isset($_POST["submit"])){
   $connection = mysqli_connect("localhost","root","*126*mysql#","philemon");
   if($connection){
     $name = $_POST['name'];
     $index_number = $_POST['indexnumber'];
     $password = $_POST['password'];
     $cpassword = $_POST['cpassword'];
     $email = $_POST['email'];
     $dp = $_FILES['file'];

     $fileTempName = $_FILES['file']['tmp_name'];

     $filDestination = "images/".$index_number.".png";

    $insert = "INSERT INTO users values('$name','$index_number','$email','$password','$filDestination')";
    $query = mysqli_query($connection,$insert);
    $dpupload = move_uploaded_file($fileTempName,$filDestination);
    $select = "SELECT index_number from users where index_number = ? Limit 1";

    $stmt=$connection->prepare($select);
    $stmt->bind_param("s",$index_number);
    $stmt->execute();
    $stmt->bind_result($index_number);
    $stmt->store_result();
    $id=$stmt->num_rows;
    if($id==0){#if that index number does not exits
       if($password == $cpassword){
         if($query && $dpupload){
           echo'
      <script>
       alert("new account created");
      </script>
    ';
         }
         else{
         echo'
      <script>
       alert("unable to create an account right now");
      </script>
    ';
  }
       }
       else{
         echo'
      <script>
       alert("password mismatch");
      </script>
    ';
       }
    }
    else{
      echo'
      <script>
       alert("account created");
      </script>
    ';
    }
  }
  else{
    echo '
    <script>
     alert("can not connect to server right now");
    </script>
  ';
    }
  }
  ?>

    <header>
        <h1>ASSIGNMENT/PROJECT WORKK SUBMISSION</h1>
    </header>

    <section>
        <div class="log">
            <h3>New account</h3>

            <div class="type">
                <form action="noaccount.php" method="POST" enctype="multipart/form-data">
                    <a>Name</a>
                    <p>
                        <input type="text" name="name" id="name" required>
                    </p>

                    <a>Index number</a>
                    <p>
                        <input type="text" name="indexnumber" id="indexnumber" required>
                    </p>

                    <a>E-mail</a>
                    <p>
                        <input type="email" name="email" id="email" required>
                    </p>



                    <div class="ppp">
                        <a>Password</a>
                        <p>
                            <input type="password" name="password" id="password" required>
                        </p>

                        <a>Confirm password</a>
                        <p>
                            <input type="password" name="cpassword" id="cpassword" required>
                        </p>

                        <a>Display image(optional)</a>  <input type="file" name="file" required id="dp">
                    </div>
                    <button type="submit" name="submit">Create account</button>
                </form>

            </div>
        </div>
    </section>

    <footer>
        copyright&copy;philemonSoftwareInc
    </footer>




    <style>
        body{
            margin:0px;
        }
        header{
            background-color:rgb(2, 10, 34);
            color:aqua;
            padding:20px;
            text-align:center;
            border-bottom: 3px solid rgb(108, 176, 221);
        }
        section{
            background: linear-gradient(rgba(0, 0, 0, 0.774),rgba(0, 0, 0, 0.753)), url('./images/back.svg');
            padding:100px;
        }
        .log{
            border: 1px solid rgb(154, 148, 231);
            width:60%;
            height:fit-content;
            background-color:rgb(134, 202, 241);
            border-radius:10px;
            margin:10px auto;
            padding:20px;
        }
        .log h3{
            color:rgb(2, 10, 34);
            margin-left:20px;
            font-size:30px;

        }
        .ppp{
            float:right;
            width:fit-content;
            margin-top:-5.7cm;
        }



        .type a{
            font-weight:bold;
        }
        .type button{
            color:aqua;
            background-color:rgb(2, 10, 34); ;
            border: none;
            border-radius: 5px;
            width:120px;
            height:30px;
        }
        #fp{
            font-size: 10px;
            margin-left: 30px;
        }
        input[type="password"]:hover{
            border: 1px solid aqua;
        }

        input[type="text"]:hover{
            border: 1px solid aqua;
        }
        input[type="password"],input[type="text"],input[type="email"]{
            border-radius:5px;
        }

        input[type="file"]{
          background-color: rgb(2,10,35);
          color:white;
        }

        footer{
            background-color:rgb(1, 4, 14);
            color:rgb(12, 124, 124);
            padding:10px;
            text-align:center;
          }


    </style>


</body>
</html>
