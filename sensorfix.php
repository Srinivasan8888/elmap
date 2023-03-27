<?php 
require "conn.php";
header('Content-Type: application/json');
$sql = "SELECT * FROM flowmeter ORDER BY timestamp DESC LIMIT 1";
$query=mysqli_query($conn, $sql);
$row=mysqli_fetch_array($query); 
$sensors = [
    'level' => $row['level'],
    'lat' => $row['lat'],
    'long' => $row['long']
];

echo json_encode($sensors);
?>  