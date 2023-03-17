<?php
  if(isset($_POST['upload5'])){
    $connection = mysqli_connect("localhost","root","*126*mysql#","philemon");
    $name = $_POST['notesname'];
    $date = date("y-m-d");
    $lecid = $_POST['lecturer'];

    $file = $_FILES["file"];
    $fileTempName = $_FILES['file']['tmp_name'];

    $filDestination = "notes/".$name.".pdf";
     $insert = 'INSERT INTO notes  values("'.$name.'","'.$date.'","'.$filDestination.'","'.$lecid.'")';
    $query = mysqli_query($connection,$insert);
    $upload = move_uploaded_file($fileTempName,$filDestination);
    if($upload and $query){
      echo "
        <script>
              alert('notes uploaded successfully');
        </script>
     ";
    }
    else{
      echo "
        <script>
              alert('error uploading notes');
        </script>
     ";
    }


  }
 ?>
