<html>
<head>
	<title>Download File</title>
</head>
<body>
<h1>Files present on Server</h1>

<?php
$con = mysqli_connect("localhost", "root", "a", "network");
if(mysqli_connect_errno())
{	
	echo "Failed to connect to MYSQL: " . mysqli_connect_error();
}	

$sql = "SELECT * FROM downloads";

if(!($result = mysqli_query($con, $sql)))
{
	die('Error: ' . mysqli_error());
}
else
{
	
	while($row = mysqli_fetch_array($result))
	{
	
		if($row['status'] == 1)
		{
			print "<a target = '_blank' href = ".$row['name']." >".$row['name']."</a><br>";		
		}
					
	}
}
?>

</body>
</html>
