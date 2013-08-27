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

		$var1 = $row[url];
		$var2 = $row[name];
		if($row[status] == 0)
		{
		system('python /var/www/Network/download.py '.$var1.' '.$var2 , $retval);
		$sql2 = "UPDATE downloads SET status = 1 where url ='$var1'";
		mysqli_query($con, $sql2);	
		}	
	}

}


?>
