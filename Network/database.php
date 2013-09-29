<html>
<head>
<title>Database Entry</title>
</head>
<body>

<?php

function remote_file_size($url){
	# Get all header information
	$data = get_headers($url, true);
	# Look up validity
	if (isset($data['Content-Length']))
		# Return file size
		return (int) $data['Content-Length'];
}

$var1 = $_POST["url"];
$var2 = $_POST["save"];
$file=remote_file_size($var1);
$size = $file/1024;
$flag=0;
$d=date("Y/m/d");
#exec("/usr/local/bin/python /var/www/Network/download.py", $retval);
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
      
		if($row[url]==$var1)
			$flag=$flag+1;		
      }
}

if($flag>0)
	echo "File is Already Present on server";
else{


$sql = "INSERT INTO downloads (name, url, time, size) VALUES ('$var2', '$var1', '$d',$size)";

if(!mysqli_query($con, $sql))
{
	die('Error: ' . mysqli_error());
}
echo "1 record added -> Your request has been sent";


}
mysqli_close($con);

?>
</body>
</html>
