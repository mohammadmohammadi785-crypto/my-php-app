 <?php 
 include ("connect.php");
 if(isset($_GET['err'])){
    echo "<h1>You Already have an Account</h1>";
 }
 if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dastor = "SELECT * FROM users WHERE email = '$email' AND pwd = '$password'";
    if($connect->query($dastor)->num_rows>0){
        session_start();
        $result = $connect->query($dastor);
        
        // $_SESSION['user']=$user;
        while($row = $result->fetch_assoc()){
            $_SESSION['user_id']=$row['id'];
        }
        header("Location: Home.php");
    }
    else{
        echo "<h1>Invalid email or password</h1>";
    }
 }
//  else{
//     echo "<h1>Invalid user name or password</h1>";
//  }
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <link rel="stylesheet" href="../src/output.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./fontawesome-free-5.15.4-web/css/all.min.css">
 </head>
 <body>
    <div class="w-full flex justify-center items-center">
        <form action=<?php echo $_SERVER["PHP_SELF"]; ?> method="post" class="w-[50%] h-fit my-8 rounded-md shadow-2xl p-4 flex flex-col justify-center items-center">
            <h1 class="text-3xl font-bold my-4">login</h1>
            <input name="email" class="py-3 px-2 rounded-md w-full border focus:outline-0 my-2 hover:border-blue-400" type="email" placeholder="Email">
            <input name="password" class="py-3 px-2 rounded-md w-full border focus:outline-0 my-2 hover:border-blue-400" type="password">
            <button class="py-3 px-4 w-30 bg-blue-400 space-x-7 text-white rounded-md" type="submit">Login</button>
            <h1 class="my-2">Dont have an account <a href="signup.php" class="text-blue-400 underline">create one!</a> </h1>
            <button class="py-2 px-5 bg-transparent hover:border-blue-400 rounded-md border">
                <i class="fab fa-google mr-2"></i>sign in with google
            </button>
        </form>
    </div>
 </body>
 </html>