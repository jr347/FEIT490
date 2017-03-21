<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>
<?php

require_once '/usr/share/php/PhpAmqpLib/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
require_once ('connect.inc');

//$media_str = $_GET['q'];
$data = array();
$data['type'] = "newsfeed";
//$data['upcoming'] = "$media_str";

$msg = json_encode($data);

$login_rpc = new RpcClient();
$response = $login_rpc->call($msg);
$results = json_decode($response, true);
$count = 0;

echo "<table>
<tr>
<th>Title</th>
<th>ID</th>
<th>Realease Date</th>
</tr>";
while ($count < count($results["results"])){
	echo "<tr>";
	echo "<td>" . $results['results']["$count"]["title"] . "</td>";
	echo "<td>" . $results['results']["$count"]["id"] . "</td>";
	echo "<td>" . $results['results']["$count"]["release_date"] . "</td>";
	echo "</tr>";
	$count ++ ;
}
echo "</table>";
?>

</body>
</html>
