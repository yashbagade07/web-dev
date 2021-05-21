<?php
include 'connect.php';
?>
<?php
$result = mysqli_query($conn,"SELECT* from accounts ORDER by No ")
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bank</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
   <div class="display">
    <table class="content-table">
      <thead>
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th>Email</th>
          <th>Balance</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($a = mysqli_fetch_array($result)) {

          // code...
        echo  '<tr>';
        echo '<td>'.$a['No'].'</td>';
        echo '<td>'.$a['Name'].'</td>';
        echo '<td>'.$a['Email'].'</td>';
        echo '<td>'.$a['Balance'].'</td>';
        echo '</tr>';
        }
        ?>

      </tbody>
    </table>
  </div>


  </body>
</html>
