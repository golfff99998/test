<?php 
   session_start();

    if (!$_SESSION['userid']) {
        header("Location: main.php");
    } else {}

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title>Admin Page</title>
</head>
<body>
<table width="600" border="1" align= "center">
<tr><th>
 <h1 align= "center">ยินดีต้อนรับ</h1>
        
        <h2 align= "center">Hi, <?php echo $_SESSION['username']; ?></h2>
        </th></tr>
        </table>
        <p align= "center" ><a href="logout.php">Logout</a>
    <a href="insert.php">เพิ่มหนัง</a></p>
	<br>
	<hr>
	<br>
	<br>    
	<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$strKeyword = null;

	if(isset($_POST["txtKeyword"]))
	{
		$strKeyword = $_POST["txtKeyword"];
	}
?>
<form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
  <table width="599" border="0" align= "center">
    <tr>
      <th>ค้นหาหนัง
      <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $strKeyword;?>" >
      <input type="submit" value="Search"></th>
    </tr>
  </table>
</form>
<?php
   $serverName = "localhost";
   $userName = "root";
   $userPassword = "";
   $dbName = "lab_test";
   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);	
   $sql = "SELECT * FROM movie WHERE m_name LIKE '%".$strKeyword."%' ";
   $query = mysqli_query($conn,$sql);
?>
<table width="600" border="0" align= "center">
  <tr>
    <th width="91"> <div align="center">ID </div></th>
    <th width="98"> <div align="center">ขื่อหนัง </div></th>
    <th width="198"> <div align="center">วันเวลาที่ฉาย </div></th>   
  </tr>
  
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
  <tr>
    <td><div align="center"><?php echo $result["m_id"];?></div></td>    
    <td><div align="center"><?php echo $result["m_name"];?></div></td>
    <td align="center"><?php echo $result["date"];?></td>  
	<td align="center"><a href="edit.php?m_id=<?php echo $result["m_id"];?>">Edit</a></td>
	<td align="center"><a href="delete.php?m_id=<?php echo $result["m_id"];?>">Del</a></td>	
  </tr>
<?php
}
?>

</table>
<?php
mysqli_close($conn);
?>
<hr>
</body>
</html>


