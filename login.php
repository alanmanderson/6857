<?php
	#phpinfo();
	#display_errors = On;
	#error_reporting = E_ALL & ~E_NOTICE;
	
	function getFileConts($filename){
        $isError = true;
        while ($isError){
                try {
                        $fh = fopen($filename, 'r');
                        $theData = fread($fh, filesize($filename));
                        $isError = false;
                } catch(Exception $e){
                }
        }
        fclose($fh);
        return $theData;
	}
	
	$username = $_POST['user_name'];
	$password = $_POST['password'];
	
	$mydb = mysql_connect("sql.mit.edu", "alanma", "daBrav3s") or die(mysql_error());
	mysql_select_db("alanma+6857") or die(mysql_error());
	
	$query = "INSERT INTO users (username, password) VALUES ('$username','$password')"; 
	$result = mysql_query($query) or die(mysql_error());

#	$fp = fsockopen("ssl://www.zipcar.com/register/user-login", 443, $errno, $errstr, 30);
#	if (!$fp) {
#    	  echo "$errstr ($errno)<br />\n";
#	} else {
#    	  $out = "GET / HTTP/1.1\r\n";
#    	  $out .= "Host: www.example.com\r\n";
#    	  $out .= "Connection: Close\r\n\r\n";
#    	  fwrite($fp, $out);
#    	  while (!feof($fp)) {
#    	    echo fgets($fp, 128);
#    	  }
#   	  fclose($fp);
#	}
	#echo $username;
	#echo $password;
	#if ($result) echo "yay";	
	#header("location: https://www.zipcar.com/register/index?errors={%22zoops%22:[{%22key%22:%22authentication.login_invalid%22}]}&return_url=&signature=");
  	$tokens = getFileConts("hashVals/curVals.txt");
  	$vals = explode(",", $tokens);
	$timeVal = $vals[0];
	$tokenVal = $vals[1];
	$hashVal = $vals[2];
	echo $tokens;
	echo "$timeVal $tokenVal $hashVal";

$ph = popen( "/usr/bin/openssl s_client -connect secure.geicp.com:443 -quiet 2>/dev/null <<EOM\nGET / HTTP/1.0\n\nEOM\n", "r" );
$response = fgets( $ph, 1024 );

if( stristr( $response, "200 OK" ) )
{
	$post_data = "time=$timeVal&token_id=$tokenVal&hash=$hashVal";
	$content_length = strlen($post_data);

#	header('POST /register/user-login HTTPS/1.0');
#	header("method: POST\r\n");
#	header('Host: localhost\r\n');
#	header('Host: https://www.zipcar.com/register/user-login');
#	header('Connection: close');
#	header('Content-type: application/x-www-form-urlencoded\r\n');
#	header("Content-length: $content_length\r\n");
#	header('');
#	header("$post_data\r\n\r\n");
#	header( "Location: https://www.zipcar.com/register/user-login\r\n" );
#	exit;
}



?>