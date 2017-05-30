<?php
if (empty($_SESSION['user'])) {
        header("Location: ?page=login");
    } else {

$kasutajanimi = $_SESSION['user'];

$sql = "SELECT * FROM uus_transport WHERE kasutajanimi = '$kasutajanimi'";
$result = db_query($sql);
?>
<div class="table-responsive"> 
<h3>Kuvatud read mis on teie kasutajanimi all oli lisatud</h3>
<table class="table table-striped table-bordered table-hover">

<thead>
        <tr>
            <th>No</th>
            <th>Kuupäev</th>
            <th>Sõiduki regNR</th>
            <th>Dokumendi NR</th>
            <th>Autojuhi Nimi</th>
            <th>Kauba vedaja</th>
        </tr>
    </thead>
 
    <tbody>
      <?php while ($row = mysqli_fetch_array($result)) { ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['dateposted']; ?></td>
            <td><?php echo $row['auto_regnr']; ?></td>
            <td><?php echo $row['dok_nr']; ?></td>
            <td><?php echo $row['juhi_nimi']; ?></td>
            <td><?php echo $row['vedaja']; ?></td>
          </tr>
      <?php } ?>
    </tbody>

</table>
</div>
<?php
}
 ?>
