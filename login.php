<?php

include __DIR__ . "/admin/services/auth.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
   if (!isset($_POST["username"]) || !isset($_POST['password'])) {
      header('location:login.php');
      return;
   }
   
   if (!$_POST['username'] || !$_POST['password']) {
      header('location:login.php');
      return;
   }
   
   if (signin($mysqli, $_POST)) {
      header('location:/admin/dashboard.php');
   }
   echo "<script>alert('login gagal'); window.location.href = '/login.php'</script>";
}

// die;
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

   <title>Login</title>
</head>

<body>
   <section class="vh-100" style="background-color: #508bfc;">
      <div class="container py-5 h-100">
         <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
               <div class="card shadow-2-strong" style="border-radius: 1rem;">
                  <form method="post" class="card-body p-5">

                     <h3 class="mb-5">Sign in</h3>

                     <div class="form-group mb-3">
                        <label for="username" class="text-left">Username</label>
                        <input type="text" name="username" id="username" class="form-control" />
                     </div>

                     <div class="form-group mb-3">
                        <label for="password" class="text-left">Password</label>
                        <input type="password" name="password" id="password" class="form-control" />
                     </div>

                     <div class="d-flex">
                        <button class="btn btn-primary btn-lg btn-block w-100" type="submit">Login</button>
                     </div>

                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</body>

</html>