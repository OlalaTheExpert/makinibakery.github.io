<head>
  <link rel="stylesheet" href="css/sweetalert2.css">
  <script type="text/javascript" src="js/sweetalert2.js"></script>
  <script type="text/javascript" src="js/sweetalert2.all.js"></script>
</head>

</html>
<?php
$Username = $_POST['name'];
$Email = $_POST['email'];
$Subject = $_POST['subject'];
$Message = $_POST['message'];

 $conn = new mysqli('localhost', 'root','','bakery');
 if($conn->connect_error){
  die('Connection Failed : '.$conn->connect_error);
 }
 else
 {
  $stmt = $conn->prepare("INSERT INTO message (name, email, subject, message) values(?,?,?,?)");
  $stmt->bind_param("ssss",$Username, $Email, $Subject, $Message);
$stmt->execute();
echo "<script>
    Swal.fire({
       title: 'Message sent successfully',
       text: 'Get back?',
      icon: 'success',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes!',
        }).then((result) => {
      if (result.value) {
          Swal.fire(
              'Thanks so much',              
              'success',
              'timer: 1500',
              window.location.href = 'index.php'
          )
      }
  })
      </script>";;


  $stmt->close();
  $conn->close();
}
?>