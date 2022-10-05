<?php

$message="";
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $userid=$_POST['userid'];
    $first_name=$_POST['firstname'];
    $last_name=$_POST['lastname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];

    $servername = "localhost";
    $username = "ahmed";
    $password = "0123";
    $dbname = "mydb";

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    

    $sql = "UPDATE `users` SET `firstname`=:firstname,`lastname`=:lastname,`email`=:email,`phone`=:phone,`gender`=:gender WHERE `id`=:userid";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':userid', $userid);
    $stmt->bindParam(':firstname', $first_name);
    $stmt->bindParam(':lastname', $last_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':gender', $gender);
    


    $stmt->execute();
    
    echo "record upted successfully ";
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

    <title>update</title>
  </head>
  <body>
  <?php
    include('navbar.php');
    ?>
    <form class="p-5 w-50 mx-auto my-3" method="post" action="update.php">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label"> id</label>
        <input type="text" name="userid" class="form-control" id="exampleFormControlInput1" placeholder="Enter  id">
      </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">first name</label>
            <input type="text" name="firstname" class="form-control" id="exampleFormControlInput1" placeholder="Enter first name">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">last name</label>
            <input type="text" name="lastname" class="form-control" id="exampleFormControlInput1" placeholder="Enter lastname">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">email</label>
            <input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter your email">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">phone</label>
            <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="Enter your phone number">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">gender</label>
            <input type="text" name="gender" class="form-control" id="exampleFormControlInput1" placeholder="Enter your gender">
          </div>  
         <button class="btn btn-lg btn-info"> update user</button>

    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>