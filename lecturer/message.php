<?php
     if(isset($_POST['submit'])){
       $connection = mysqli_connect("localhost","root","*126*mysql#","philemon");
       $title = $_POST['title'];
       $message = $_POST['message'];
       $by = $_POST['who'];
       $date = date("d-m-y");
       $id = 0;

       $insert = 'insert into information values('.$id.',"'.$by.'","'.$date.'","'.$message.'","'.$title.'")';
      // //  $query = mysqli_query($connection, $insert);
       if($query){
         echo "
              <script>
                    alert('message sent');
              </script>

           ";
       }
       else{
         echo "
              <script>
                    alert('could not send message try again');
              </script>
          
           ".$insert;
       }
     }
 ?>
