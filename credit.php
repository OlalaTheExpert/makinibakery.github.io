<html>

<head>
  <link rel="stylesheet" href="css/sweetalert2.css">
  <script type="text/javascript" src="js/sweetalert2.js"></script>
  <script type="text/javascript" src="js/sweetalert2.all.js"></script>
</head>

</html>
<?php

#include("inc/functions.php");
$name = $_POST['name'];
$number = $_POST['number'];
$code = $_POST['security-code'];
$date = $_POST['expiration-month-and-year'];

$conn = new mysqli('localhost', 'root', '', 'Bakery');
if ($conn->connect_error) {
  die('Connection Failed : ' . $conn->connect_error);
} else {
  $stmt = $conn->prepare("INSERT INTO credit_card(name, NOs, security_code, DOE) values(?,?,?,?)");
  $stmt->bind_param("ssss", $name, $number, $code, $date);
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