<?php
  $connection = mysqli_connect("localhost","root","*126*mysql#","philemon");
  $name = $_POST['name'];
  $id = $_POST['indexnumber'];
  $password = $_POST['password'];
  $email = $_POST['email'];

  $updade = 'UPDATE lecturer set name="'.$name.'",id="'.$id.'", email="'.$email.'",password="'.$password.'" where id="'.$id.'" ';
  $query = mysqli_query($connection, $updade);
  if($query){
      echo '
      <script>alert("Profile Updated")</script>
      ';
  }
  else{
    echo '
    <script>alert("Profile could not be Updated")</script>
    ';
  }

?>