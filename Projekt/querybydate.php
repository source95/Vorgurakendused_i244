<?php
if (empty($_SESSION['user'])) {
        header("Location: ?page=login");
    } else {

	$post_at = "";
	$post_at_to_date = "";
	
	$queryCondition = "";
	if(!empty($_POST["search"]["post_at"])) {			
		$post_at = $_POST["search"]["post_at"];
		list($fid,$fim,$fiy) = explode("-",$post_at);
		
		$post_at_todate = date('Y-m-d');
		if(!empty($_POST["search"]["post_at_to_date"])) {
			$post_at_to_date = $_POST["search"]["post_at_to_date"];
			list($tid,$tim,$tiy) = explode("-",$_POST["search"]["post_at_to_date"]);
			$post_at_todate = "$tiy-$tim-$tid 23:59:59";
		}
		
		$queryCondition .= "WHERE dateposted BETWEEN '$fiy-$fim-$fid 00:00:00' AND '" . $post_at_todate . "'";
	}

	$sql = "SELECT * FROM uus_transport " . $queryCondition . " ORDER BY dateposted desc";
	$result = db_query($sql);
?>

<html>
	<head>	
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

	<style>
	.table-content{border-top:#CCCCCC 4px solid; width:50%;}
	.table-content th {padding:5px 20px; background: #F0F0F0;vertical-align:top;} 
	.table-content td {padding:5px 20px; border-bottom: #F0F0F0 1px solid;vertical-align:top;} 
	</style>
	</head>
	
	
    <div class="table-responsive"> 
		<h2 class="title_with_link">Registreeritud transport</h2>
  <form name="frmSearch" method="post" action="">
	 <p class="search_input">
		<input type="text" placeholder="Alates" id="post_at" name="search[post_at]"  value="<?php echo $post_at; ?>" class="input-control" />
	    <input type="text" placeholder="Kuni" id="post_at_to_date" name="search[post_at_to_date]" style="margin-left:10px"  value="<?php echo $post_at_to_date; ?>" class="input-control"  />			 
		<input type="submit" name="go" value="Otsi" >
	</p>
<?php if(!empty($result))	 { ?>
<table class="table table-striped table-bordered table-hover table-responsive">

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
   <?php  }   ?>
   <tbody>
  </table>
<?php } ?>
  </form>
  </div>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
$.datepicker.setDefaults({
showOn: "button",
buttonImage: "images/datepicker.png",
buttonText: "Date Picker",
buttonImageOnly: true,
dateFormat: 'dd-mm-yy'  
});
$(function() {
$("#post_at").datepicker();
$("#post_at_to_date").datepicker();
});
</script>
</html>

<?php
}
 ?>
