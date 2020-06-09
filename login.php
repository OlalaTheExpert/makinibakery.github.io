<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sweetalert2.css" rel="stylesheet">

  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">


    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">

            <!-- Nested Row within Card Body -->
            <div class="row">

              <div class="col-lg-6 d-none d-lg-block bg-login-image">
                <img src="img/banner-bg.jpg" width="115%" height="500vh">
              </div>
              <div class="col-lg-6">

                <div class="p-5">

                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login to enjoy our services</h1>
                  </div>
                  <form class="user" method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputUsername" aria-describedby="emailHelp" name="username" placeholder="Enter Username..." required="Username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password" required="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>

                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                  </div>
                                    <div class="text-center">
                    <a class="small" href="index.php">Back to home? </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="css/jquery/jquery.min.js"></script>
  <script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/sweetalert2.js"></script>
  <script src="js/sweetalert2.all.js"></script>



</body>

</html>

<?php

$conn = mysqli_connect('localhost', 'root', '', 'passport');


if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // processing remember me option and setting cookie with long expiry date
    if (isset($_POST['remember'])) {
        session_set_cookie_params('604800'); //one week (value in seconds)
        session_regenerate_id(true);
    }


    $sql = "SELECT * from users WHERE username LIKE '{$username}' AND password LIKE '{$password}' AND user_role = 'admin'";
    $result = $conn->query($sql);

    if ($result->num_rows != 1) {
        echo '<script>
    Swal.fire({
        title: "Failed!",
        icon: "warning",
        text: "Incorrect Email/Password",
        timer: 3000,
        showConfirmButton: false,
      })
      </script>';;
    } else {
        // Authenticated, set session variables
        echo "<script>
    Swal.fire({
      title: 'Login Success',
      text: 'Proceed to our Menu',
      icon: 'success',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes!'
  }).then((result) => {
      if (result.value) {
          Swal.fire(
              'Logged in!',
              'Enjoy your purchase.',
              'success',
              'timer: 1500',
              window.location.href = 'product.html'
          )
      }
  })
      </script>";;


        $user = $result->fetch_array();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];

        // update status to online
sleep(2);

        //redirect_to("dashboard.php");
        // do stuffs
    }
}

if (isset($_GET['msg'])) {
    echo "<p style='color:red;'>" . $_GET['msg'] . "</p>";
}
?>
