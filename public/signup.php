<?php 
  include("connect.php");
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $name = $_POST['name'];
     $lastname= $_POST['lastname'];
     $email= $_POST['email'];
     $password1= $_POST['password1'];
     $password2= $_POST['password2'];
     if($password1===$password2){
      $dastor= "INSERT INTO users (name, lastName, email, pwd)    VALUES('$name','$lastname','$email','$password1')";
      $query= "SELECT * FROM users where email= '$email'";
      if($connect-> query($query)->num_rows > 0){
        header("loaction: login.php?err=error");
      }
      else{
      if($connect->query($dastor)=== true){
        header("location: login.php");
      }
      else{
        echo "<script>alert('Error: ".$connect->error . "'</script>";
        header("location: login.php");
      }
     }}else{
      echo "<script>alert('password do not match!');</script>";
     }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../src/output.css" />
  </head>
  <body>
    <div class="w-full flex justify-center items-center h-screen ">
      <div class="w-[90%] h-fit p-4 shadow-2xl rounded-md">
        <h1 class = "font-mono text-2xl text-center my-5 font-bold">Sign Up</h1>
        <div class="grid grid-cols-2 gap-4">
          <form action=<?php echo $_SERVER["PHP_SELF"] ?> method="post" class="flex justify-center items-center flex-col">
            <input name="name" class="py-3 px-2 rounded-md w-full border focus:outline-0 my-2 hover:border-blue-400" type="text" placeholder="Name">
            <input name="lastname" class="py-3 px-2 rounded-md w-full border focus:outline-0 my-2 hover:border-blue-400" type="text" placeholder="Last Name">
            <input name="email" class="py-3 px-2 rounded-md w-full border focus:outline-0 my-2 hover:border-blue-400" type="email" placeholder="Email">
            <input name="password1" class="py-3 px-2 rounded-md w-full border focus:outline-0 my-2 hover:border-blue-400" type="password" placeholder="password">
            <input name="password2" class="py-3 px-2 rounded-md w-full border focus:outline-0 my-2 hover:border-blue-400" type="password" placeholder="Confirm Password">
            <button class="py-3 px-4 w-30 bg-blue-400 space-x-7 text-white rounded-md" type="submit">Sign Up</button>
          </form>
          <div>
            <img src="../public/images/sliderimg1.png" class ="w-full rounded-md h-full" alt="">
          </div>
      </div>
    </div>
  </body>
</html>
