<html>

<head>
  <link rel="stylesheet" href="css/sweetalert2.css">
  <script type="text/javascript" src="js/sweetalert2.js"></script>
  <script type="text/javascript" src="js/sweetalert2.all.js"></script>
</head>

</html>
<?php

#include("inc/functions.php");
$Fname = $_POST['Name'];
$Email = $_POST['Email'];
$Password = $_POST['password'];


$conn = new mysqli('localhost', 'root', '', 'Bakery');
if ($conn->connect_error) {
  die('Connection Failed : ' . $conn->connect_error);
} else {
  $stmt = $conn->prepare("INSERT INTO register(username, email, password, user_role) values(?,?,?,'user')");
  $stmt->bind_param("sss", $Fname, $Email, $Password);
  $stmt->execute();

  echo "<script>
    Swal.fire({
      title: 'Registration Successful',
      text: 'Proceed to Makini Bakery Menu',
      icon: 'success',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes!'
  }).then((result) => {
      if (result.value) {
          Swal.fire(
              'Logged in!',
              
              'Have Fun.',
              'success',
              'timer: 1500',
              window.location.href = 'product.html'
          )
      }
  })
      </script>";;


  $stmt->close();
  $conn->close();
}
?>