<?php
require_once '/usr/share/php/PhpAmqpLib/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
require_once ('connect.inc');

$userN = $_POST["inputUser"];
$passw = $_POST["inputPassword"];
$fname = $_POST["inputFName"];
$lname = $_POST["inputLName"];
$email = $_POST["inputEmail"];
//echo "$userN, $passw, $fname, $lname, $email";


$data = array();
$data['type'] = "register";
$data['username'] = "$userN";
$data['password'] = "$passw";
$data['first_name'] = "$fname";
$data['last_name'] = "$lname";
$data['email'] = "$email";

$msg = json_encode($data);

$login_rpc = new RpcClient();
$response = $login_rpc->call($msg);
$results = json_decode($response, true);
echo " [.] Got ", $results, "\n";

header("Location: login2.php");
exit;

?>



