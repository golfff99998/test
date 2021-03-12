<?php
require_once "conn.php";

$m_name=$_POST['m_name'];
$date=$_POST['date'];

$sql1=" INSERT INTO movie(m_name,date) VALUES ('$m_name','$date')";
$reult1=mysqli_query($conn,$sql1);
header("Location: page.php");
?>