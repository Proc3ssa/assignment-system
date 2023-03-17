<?php
if(isset($_POST['submit'])){

$connection = mysqli_connect("localhost","root","*126*mysql#","philemon");
$index_number = $_POST["indexnumber"];
$type = $_POST["worktype"];
$code = $_POST["code"];
$file = $_FILES['file'];
$date = date("d-m-y");

$fileTempName = $_FILES['file']['tmp_name'];

$filDestination = "submissions/".$code.$index_number.".docx";


$select1 = 'SELECT title from assignments where asscode = ? Limit 1';
$stmt=$connection->prepare($select1);
$stmt->bind_param("s",$code);
$stmt->execute();
$stmt->bind_result($code);
$stmt->store_result();
$id=$stmt->num_rows;
$upload = move_uploaded_file($fileTempName,$filDestination);
   if($id !=0){ # if code returns a value
		 $select2 = 'SELECT title from assignments where asscode = "'.$code.'"';
     $deadlineselect = 'SELECT deadline from assignments where asscode = "'.$code.'"';
		 $query2 = mysqli_query($connection,$select2);
      $query3 = mysqli_query($connection,$deadlineselect);
		 $Sresults = mysqli_fetch_assoc($query2);
     $results3 = mysqli_fetch_assoc($query3);
		 $course = $Sresults["title"];
     $dead = $results3['deadline'];
     $date = date("d-m-y");
     $line = $dead[8];
     $line2 = $dead[9];
     $deaddate = $line.$line2;

		 $insert = 'INSERT INTO submissions  values(?,?,?,?,?)';
     $stmt=$connection->prepare($insert);
     $stmt-> bind_param("sssss",$index_number,$date,$course,$code,$filDestination);
     $stmt->execute();

     if($upload){
       echo "
          <script>
                alert('work uploaded successfully');
          </script>

       ";
     }

     else{
       echo "
          <script>
                alert('could not upload work try again');
          </script>

       ";
     }



   }
   else{
     echo "
        <script>
              alert('no assignment with that code');
        </script>

     ";
   }

 }




 ?>
