<?php
  $index_number = $_POST["number"];
  $name = $_POST["name"];
  $indx = $_POST["indexnumber"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $connection = mysqli_connect("localhost","root","*126*mysql#","philemon");
$update = 'UPDATE users SET name="'.$name.'",index_number="'.$indx.'",email="'.$email.'",paswrd="'.$password.'" WHERE index_number = "'.$index_number.'"';
if($query = mysqli_query( $connection,$update)){
  echo'
<script>
alert("Data updated successfully");
</script>
';
}

else{
  echo'
<script>
alert("data could not be updated");
</script>
';
}


 ?>
