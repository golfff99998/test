<?php include('conn.php');?>
<!DOCTYPE html>
<html lang="en">
<head>

<title>แก้ไขข้อมูล</title>

</head>
<body>

<?php
  $m_id = $_GET['m_id'];
  
  $query = "SELECT * FROM movie where m_id = '$m_id' " or die("Error:" . mysqli_error());  
  $result = mysqli_query($conn, $query);
  $row1 = mysqli_fetch_array($result);
  mysqli_close($conn);
  
  ?>

	<form name="frmadd"  method="post" action="save.php" enctype="multipart/form-data">
  <input type="text" name="m_id" id="m_id"value="<?php echo $m_id; ?>"  /><br>

		ชื่อ
    
      <input type="text" name="m_name" id="m_name" value="<?php echo $row1['m_name'];?>"><br>
    วันเวลาที่ฉาย
    
      <input type="text" name="date" id="date" value="<?php echo $row1['date'];?>"><br>
    
	<button type="submit" >แก้ไขข้อมูล</button>    
  
	</form>

</body>
</html>