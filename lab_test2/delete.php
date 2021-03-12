<mate charset ="utf-8" />
<?php 
echo "<pre>";
print_r($_GET);
echo "</pre>";
?>
<?php include ('conn.php'); 
$m_id = $_GET['m_id'];
$sql = " DELETE FROM movie WHERE m_id='$m_id' ";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
mysqli_close($conn);
if ($result){
echo "<script type='text/javascript'>";
echo"window.location = 'page.php'; ";
echo "</script>";
}
else {	
echo "<script type='text/javascript'>";
echo "alert('error!');";
echo"window.location = 'page.php'; ";
echo"</script>";
}
?>