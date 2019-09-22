<?php
session_start();
require_once('config.php');
require_once('navbar.php');

?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-size: 120%;
      background-image: url("massage.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      font-family: Arial, Helvetica, sans-serif;
    }



    .table {
      border-radius: 10px;
      background-color: white;
      border: 3px solid #133783;
      width: 400px;
      margin: 0 auto;
    }
  </style>
</head>

<body>

  <?php
  get_navbar(5); ?>

  <div style="padding-left:16px" class="table">
    <?php
    $db = mysqli_connect('localhost', 'root', '', 'booking');
    $result = mysqli_query($db, "SELECT timeslot, therapistname
      FROM timeslots, therapists
      WHERE timeslots.therapistid = therapists.therapistid");

    echo "<table border='1'>
    <tr>
    <th>Time</th>
    <th>Therapist</th>
    </tr>";

    while ($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row['timeslot'] . "</td>";
      echo "<td>" . $row['therapistname'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
    ?>
  </div>

</body>

</html>