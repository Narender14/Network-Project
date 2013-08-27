<?php

$now = time(); // or your date as well
$con = mysqli_connect("localhost", "root", "a", "network");
if(mysqli_connect_errno())
{	
	echo "Failed to connect to MYSQL: " . mysqli_connect_error();
}	


$sql = "SELECT * FROM downloads";
$result=mysqli_query($con, $sql);
if($result)
{

	while($row = mysqli_fetch_array($result)) {
      		$var2 = $row[name];
		$your_date = strtotime("$row[time]");
		$datediff = $now - $your_date;
		$difference=floor($datediff/(60*60*24));
		echo $difference;
		echo " ";
		if($difference>5){
		system('rm /var/www/Network/'.$var2.' ', $retval);
		#echo "i am here";
		$r="DELETE FROM downloads where url='".$row[url]."'";
		$current=mysqli_query($con, $r);			

		}
			
      }
}

else 
	die('Error: ' . mysqli_error());

?>
