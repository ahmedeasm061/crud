<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $userid=$_POST['userid'];

    $servername = "localhost";
    $username = "ahmed";
    $password = "0123";
    $dbname = "mydb";

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    

    $sql="DELETE FROM `users` WHERE `id`=:userid";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':userid', $userid);

    $stmt->execute();
    
    echo "record deleted successfully ";
    } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;

    }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <?php
    include('navbar.php');
    ?>
    <form class="p-5 w-50 mx-auto my-3" method="post" action="delete.php">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">course id</label>
        <input type="text" name="userid" class="form-control" id="exampleFormControlInput1" placeholder="Enter course id">
      </div>
     
         <button class="btn btn-lg btn-info"> delete user </button>

    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>