<?php
include 'connect.php';
?>
<?php
$result = mysqli_query($conn,"SELECT* from history ORDER by name ")
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bank</title>
    <link rel="stylesheet" href="css/style_history.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  </head>
  <body>
  <div class="header">
    <img class="img1" src="bank.png" alt="bank">
    <h1 class="header-h1">bagade BANK</h1>
    <a href="/basicbank/index.html">Home</a>
    <a href="#">About</a>

     <a href="Main_task.php">Send Money</a>


  </div>
   <div class="display">
    <table class="content-table">
      <thead>
        <tr>
          <th>Time/Date</th>
          <th>From: Name</th>
          <th>To: Name</th>
          <th>Amount</th>

        </tr>
      </thead>
      <tbody>
        <?php
        while ($a = mysqli_fetch_array($result)) {

          // code...
        echo  '<tr>';
        echo '<td>'.$a['time'].'</td>';
        echo '<td>'.$a['name'].'</td>';
        echo '<td>'.$a['to'].'</td>';
        echo '<td>'.$a['balance'].'</td>';
        echo '</tr>';
        }
        ?>

      </tbody>
    </table>
  </div>


  </body>
</html>
