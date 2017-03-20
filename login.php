<?php
require_once '/usr/share/php/PhpAmqpLib/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RpcClient {
	private $connection;
	private $channel;
	private $callback_queue;
	private $response;
	private $corr_id;

	public function __construct() {
		$this->connection = new AMQPStreamConnection('localhost', 5672, 'admin', 'admin');
		$this->channel = $this->connection->channel();
		list($this->callback_queue, ,) = $this->channel->queue_declare("", false, false, true, false);
		$this->channel->basic_consume(
		$this->callback_queue, '', false, false, false, false, array($this, 'on_response'));
	
	}
	
	public function on_response($rep) {
		if($rep->get('correlation_id') == $this->corr_id){
			$this->response = $rep->body;
		}
	}
	
	public function call($n) {
		$this->response = null;
		$this->corr_id = uniqid();

		$msg = new AMQPMessage(
			(string) $n,
			array('correlation_id' => $this->corr_id,
				'reply_to' => $this->callback_queue)
		);
		$this->channel->basic_publish($msg, '', 'rpc_queue');
		while(!$this->response){
			$this->channel->wait();
		}
		$resp = $this->response;
		return $resp;
	}
};

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
echo " [.] Got ", $results, "\n";

header("Location: profile.html");
exit;

?>



