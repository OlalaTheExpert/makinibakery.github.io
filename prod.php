<html>

<head>
  <link rel="stylesheet" href="css/sweetalert2.css">
  <script type="text/javascript" src="js/sweetalert2.js"></script>
  <script type="text/javascript" src="js/sweetalert2.all.js"></script>
</head>

</html>
<?php

#include("inc/functions.php");
$cmd = $_POST['cmd'];
$add = $_POST['add'];
$business = $_POST['business'];
$item = $_POST['item_name'];
$Email = $_POST['amount'];
$discount = $_POST['discount_amount'];
$currency = $_POST['currency_code'];
$return = $_POST['return'];
$cancel = $_POST['cancel_return'];


$conn = new mysqli('localhost', 'root', '', 'Bakery');
if ($conn->connect_error) {
  die('Connection Failed : ' . $conn->connect_error);
} else {
  $stmt = $conn->prepare("INSERT INTO product(cmd, adds, business, item_name, amount, discount, currency, returns, cancels) values(?,?,?,?,?,?,?,?,?)");
  $stmt->bind_param("sssssssss", $cmd, $add, $business, $item, $Email, $discount, $currency, $return, $cancel);
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
              window.location.href = 'checkout.html'
          )
      }
  })
      </script>";;


  $stmt->close();
  $conn->close();
}
?>