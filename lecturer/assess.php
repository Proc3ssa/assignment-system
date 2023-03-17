<?php
$connection = mysqli_connect("localhost","root","*126*mysql#","philemon");
if(isset($_POST['submit'])){
$index_number = $_POST['indexnumber'];
$asscode = $_POST['assignmentcode'];
$mark =$_POST['marks'];

$select1 = "SELECT index_number from users where index_number = ? Limit 1";
$stmt = $connection -> prepare($select1);
$stmt -> bind_param("s",$index_number);
$stmt -> execute();
$stmt -> bind_result($index_number);
$stmt -> store_result();
$in=$stmt->num_rows;

  if($in != 0){
    $select2 = "SELECT asscode from assignments where  asscode = ? Limit 1";
    $stmt = $connection -> prepare($select2);
    $stmt -> bind_param("s",$asscode);
    $stmt -> execute();
    $stmt -> bind_result($asscode);
    $stmt -> store_result();
    $ac=$stmt->num_rows;
          if($ac !=0){
            $select3 = "SELECT title from assignments where asscode = '$asscode'";
            $query3 = mysqli_query($connection,$select3);
            $result = mysqli_fetch_assoc($query3);
            $course = $result['title'];
            $insert = 'INSERT INTO assessment values("'.$index_number.'","'.$mark.'","'.$asscode.'","'.$course.'")';
            $query3 = mysqli_query($connection, $insert);
             if($query3){
               echo "
                   <script>
                         alert('assessment done');
                   </script>

                ";

             }
             else{
               echo "
                   <script>
                         alert('can not assess student try again');
                   </script>

                ";
             }

          }
          else{
            echo "
                <script>
                      alert('no assignment witht that code');
                </script>

             ";
              }

  }
  else{
    echo "
        <script>
              alert('no student with that index number');
        </script>

     ";
      }



}
 ?>
