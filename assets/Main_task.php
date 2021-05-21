<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

  </head>
  <body>
  <div class="header">
    <img class="img1" src="bank.png" alt="bank">
    <h1 class="header-h1">bagade BANK</h1>
    <a href="/basicbank/index.html">Home</a>
    <a href="#">About</a>

    <a href="history.php">History</a>


  </div>

  <!--h2 class="info">Account Name: Sumit Patil</h2-->

<?php

$name = $amount =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (empty($_POST["fname"])) {
   $nameErr = "Name is required";
 } else {
   $name = $_POST["fname"];

 }

 if (empty($_POST["lname"])) {
   $emailErr = "ammount is required";
 } else {
   $amount = $_POST["lname"];

   }
   if (empty($_POST["ffname"])) {
     $emailErr1 = "name is required";
   } else {
     $name1 = $_POST["ffname"];

     }

 // echo "$name";
 // echo "$ammount";
 //MongoUpdateBatch............searching............................................................

$sql = "SELECT No, Name, Email, Balance FROM accounts WHERE Name='$name'";
$sql1 = "SELECT No, Name, Email, Balance FROM accounts WHERE Name='$name1'";
$result = $conn->query($sql);
$result1 = $conn->query($sql1);
$balance=0;
$balance1=0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $balance = $row["Balance"];
    $balance=$balance-$amount;
  //  echo "Balance " . $row["Balance"].  "<br>";
  }
} else {
  //echo "0 results";
}
//to.......................
if ($result1->num_rows > 0) {
  // output data of each row
  while($row = $result1->fetch_assoc()) {
    $balance1 = $row["Balance"];
    $balance1=$balance1+$amount;
  //  echo "Balance " . $row["Balance"].  "<br>";
  }
} else {
  //echo "0 results";
}
$conn->close();
//...............................updating.................................................
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bankingsystem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE accounts SET Balance='$balance' WHERE Name='$name'";
$sql1 = "UPDATE accounts SET Balance='$balance1' WHERE Name='$name1'";
$conn->query($sql);
$conn->query($sql1);
// if ($conn->query($sql) === TRUE) {
//   echo '<script>alert("Record updated successfully")</script>';
//   // echo "Record updated successfully";
// } else {
//   echo "Error updating record: " . $conn->error;
// }

$conn->close();
//.............updating histroy
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bankingsystem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// else {
//   echo "successfully";
// }
date_default_timezone_set('Asia/Kolkata');
$t=time();
$time=date("h:i:sa")." ".  date("d-m-y",$t);
 $sql = "INSERT INTO history VALUES ('".$time."','".$name."','".$name1."','".$amount."')";
 $result = $conn->query($sql);

 $conn->close();

}

     ?>

    <div class="wrapper">
    <div class="title">
    <h1>Transfer Money</h1>
    </div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="contact-form">
    <div class="input-fields">
      <input type="text" class="input" name="fname" placeholder="From: Name">
      <input type="text" class="input" name="ffname" placeholder="To: Name">

      <input type="text" class="input" name="lname" placeholder="amount">
    </div>
    <div class="msg">

      <div class="btn">
        <input type="submit" value="Send">
      </div>
    </div>
    </div>
    </form>
    </div>
<?php
include 'display.php';
?>


  </body>
</html>
