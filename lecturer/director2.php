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


          if (isset($_POST['ua'])){


                   echo'
                      <form action="Lecturer.php" method="post">
                        <input type= "text" name="id" value="'.$idnumber.'" required style="visibility:hidden">
                        <h2 align="center">>>upload assignment page</h2>
                        <div class="submit">
                              <button type="submit" name="submit">Next</button>
                        </div>
                      </form>
                   ';
           }


           if (isset($_POST['un'])){


                    echo'
                       <form action="uploadnotes.php" method="post">
                         <input type= "text" name="id" value="'.$idnumber.'" required style="visibility:hidden">
                         <h2 align="center">>>upload notes page</h2>
                         <div class="submit">
                               <button type="submit" name="submit">Next</button>
                         </div>
                       </form>
                    ';
            }

            if (isset($_POST['va'])){


                     echo'
                        <form action="viewassignments.php" method="post">
                          <input type= "text" name="id" value="'.$idnumber.'" required style="visibility:hidden">
                          <h2 align="center">>>view assignment page</h2>
                          <div class="submit">
                                <button type="submit" name="submit">Next</button>
                          </div>
                        </form>
                     ';
             }


             if (isset($_POST['as'])){


                      echo'
                         <form action="assessstudents.php" method="post">
                           <input type= "text" name="id" value="'.$idnumber.'" required style="visibility:hidden">
                           <h2 align="center">>>assess students page</h2>
                           <div class="submit">
                                 <button type="submit" name="submit">Next</button>
                           </div>
                         </form>
                      ';
              }

              if (isset($_POST['ib'])){


                       echo'
                          <form action="informationboard.php" method="post">
                            <input type= "text" name="id" value="'.$idnumber.'" required style="visibility:hidden">
                            <h2 align="center">>>information page page</h2>
                            <div class="submit">
                                  <button type="submit" name="submit">Next</button>
                            </div>
                          </form>
                       ';
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
