<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registration</title>

    <!-- Custom fonts for this template-->
    
      <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    

</head>


<body class="bg-gradient-primary">

    <div class="container">


        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-4 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">

                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <img src="img/15.jpg" width="115%" height="500vh">
                            </div>
                            <div class="col-lg-6">

                                <div class="p-5">

                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                    </div>
                                    <form class="user" action="connect.php" method="POST">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter First Name..." name="firstname" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Second Name......" name="last_name" required>
                                            </div>
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username..." name="username" required>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Register">
                                            </input>
                                        </div>



                                    </form>
                                    <hr>

                                    <div class="text-center">
                                        <a class="small" href="login.php">Already have an account? Login!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="index.html">Back to Home!</a>
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



</body>

</html>
