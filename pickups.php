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
$phone = $_POST['phone'];
$landmark = $_POST['landmark'];
$town = $_POST['town'];
$address = $_POST['address'];


$conn = new mysqli('localhost', 'root', '', 'Bakery');
if ($conn->connect_error) {
  die('Connection Failed : ' . $conn->connect_error);
} else {
  $stmt = $conn->prepare("INSERT INTO pick_ups(name, phone, landmark, town, address) values(?,?,?,?,?)");
  $stmt->bind_param("sssss", $name, $phone, $landmark, $town, $address);
  $stmt->execute();

  echo "<script>
    Swal.fire({
      title: 'Details submitted successfully',
      text: 'Proceed to Payment',
      icon: 'success',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes!'
  }).then((result) => {
      if (result.value) {
          Swal.fire(                       
              'Enjoy your services.',
              'success',
              'timer: 1500',
              window.location.href = 'payment.html'
          )
      }
  })
      </script>";;


  $stmt->close();
  $conn->close();
}
?>