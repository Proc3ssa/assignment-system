<?php
 if(isset($_POST['upload'])){
   $connection = mysqli_connect("localhost","root","*126*mysql#","philemon");
   $title = $_POST['assignmentname'];
   $code = $_POST['assignmentcode'];
   $deadline = $_POST['deadline'];
   $file = $_FILES['file'];
   $fileTempName = $_FILES['file']['tmp_name'];
   $lecturer = $_POST['lecturer'];

   $filDestination = "bylecturer/".$title.".pdf";

   $select1 = 'SELECT asscode from assignments where asscode = ? Limit 1';

   $stmt=$connection->prepare($select1);
   $stmt->bind_param("s",$code);
   $stmt->execute();
   $stmt->bind_result($code);
   $stmt->store_result();
   $id=$stmt->num_rows;

   

   if($id==0){
     $insert = 'INSERT INTO assignments  values("'.$title.'","'.$code.'","'.$deadline.'","'.$filDestination.'","'.$lecturer.'")';
    $query = mysqli_query($connection,$insert);
      $upload = move_uploaded_file($fileTempName,$filDestination);
      if($upload and $query){
        echo "
          <script>
                alert('work uploaded successfully');
          </script>
       ";
      }
      else{
      echo "
        <script>
              alert('error uploading work');
        </script>
     ";
   }
    }


    else{
      echo "
        <script>
              alert('Assignment code already in use');
        </script>
     ";
    }
 }

 ?>
