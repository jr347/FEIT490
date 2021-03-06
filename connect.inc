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
		$this->connection = new AMQPStreamConnection('192.168.43.125', 5672, 'IT490', '12345', 'Login');
		$this->channel = $this->connection->channel();
		list($this->callback_queue, ,) = $this->channel->queue_declare("login_send", false, true, false, false);
		$this->channel->basic_consume(
		$this->callback_queue, '', false, true, false, false, array($this, 'on_response'));
	
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
		$this->channel->basic_publish($msg, '', 'login_send');
		while(!$this->response){
			$this->channel->wait();
		}
		$resp = $this->response;
		return $resp;
	}
};
?>
