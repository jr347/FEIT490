<?php
require_once '/usr/share/php/PhpAmqpLib/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
require_once ('connect.inc');
//session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
$userN = $_POST["userN"];
$passw = $_POST["passw"];

$data = array();
$data['type'] = "login";
$data['username'] = "$userN";
$data['password'] = "$passw";

$msg = json_encode($data);

$login_rpc = new RpcClient();
$response = $login_rpc->call($msg);
$results = json_decode($response, true);
//echo " [.] Got ", $results, "\n";

if($results){
	//echo "it works";
	echo "it works";
	$_SESSION['username'] = $data['username'];
	header("Location: profile.html");
}
else {
	$_SESSION['error'] = "Your Username or Password is invalid";
	header("Location: login.html");
}


//header("Location: profile.html");
//exit;
}
?>



