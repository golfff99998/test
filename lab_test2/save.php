<mate charset ="utf-8" />
<?php 
echo "<pre>";
print_r($_POST);
echo "</pre>";
?>
<?php include ('conn.php'); 


$m_id = $_POST['m_id'];
$m_name = $_POST['m_name'];
$date = $_POST['date'];


$sql = " UPDATE movie SET
m_name = '$m_name', 
date = '$date'

WHERE m_id = '$m_id' ";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

mysqli_close($conn);

if ($result){
    echo "<script type='text/javascript'>";
    echo"alert('edit Success');";
    echo"window.location = 'page.php'; ";
    
    echo "</script>";
    }
    else {
   		
    echo "<script type='text/javascript'>";
    echo "alert('error!');";
    echo"window.location = 'edit.php?m_id=$m_id'; ";
    echo"</script>";
    }

?>