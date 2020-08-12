<?php
   
   session_start();

    define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'signup');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if($db){

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $email    = mysqli_real_escape_string($db,$_POST['email']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT * FROM signup1 WHERE email = '$email' and password = '$password'";
 
      if($result = mysqli_query($db,$sql)){
	   
	      $count = mysqli_num_rows($result);
      
      
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count) {
       
         $_SESSION['login'] = $email;
         header("location :../html/instruction.html");
         
      }
      else {
         $error = "Your Login Name or Password is invalid";
         echo "invalid";
      }
   }
}
}
else {
	echo "can't connect";
}
?>