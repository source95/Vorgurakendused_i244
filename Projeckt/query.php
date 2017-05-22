<?php

include 'db_connect.php';

$sql = "SELECT * FROM uus_transport";
$result = db_query($sql);

echo '<table class="table table-striped table-bordered table-hover">'; // start a table tag in the HTML
?>
<thead>
        <tr>
            <th>No</th>
            <th>Time</th>
            <th>Name</th>
            <th>Address</th>
            <th>Type</th>
        </tr>
    </thead>
 
    <tbody>
      <?php while ($row = mysqli_fetch_array($result)) { ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['dateposted']; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[3]; ?></td>
            <td><?php echo $row[4]; ?></td>
          </tr>
      <?php } ?>
    </tbody>
<?php

echo "</table>"; //Close the table in HTML

 ?>
