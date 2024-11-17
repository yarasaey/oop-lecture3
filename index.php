<?php


require_once 'Session.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    $email = htmlspecialchars('email');
    $password = htmlspecialchars('password');
    $errors = [];

    // Validate email
   
    }
    if (!empty($email)) {
        $errors[] = "email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "valid email"; 
    } 
    if (!empty($password)) {
        $errors[] = "password is required";
    } elseif (!empty($password)&&strlen($password) < 4) {
        $errors[] = "valid password"; 
    } 


    
    if (!empty($errors)) {
        Session::set("errors", $errors);
    } else {
        
        Session::set("success", "Registration successful!");
    }



$errors = Session::get("errors");
if ($errors) {
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
  
  $remove =Session::remove("errors");
  if($remove){
    return $remove;
  }
} else {
  
    $success = Session::get("success");
    if ($success) {
        echo $success . "<br>";
        Session::remove("success"); 
    };

}



?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, world!</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
<?php

?>
<form method='POST' action="index.php">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" name="email">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" name="password">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
