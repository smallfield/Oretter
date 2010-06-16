<?php

require_once 'twitteroauth.php';

class Module_action extends Module
{
	function action()
	{
		session_start();
		
		$consumer_key = $this->config['twitter']['consumer_key'];
		$consumer_secret = $this->config['twitter']['consumer_secret'];
		$token_credentials = $_SESSION['token_credentials'];
		
		//not logged in
		if ($token_credentials == "") {
			header('Location: ' . $this->get_uri('top'));
			exit(1);
		}
		
		//callback
		if ($_GET['callback'] != "") {
			$callback = $_GET['callback'];
		} else {
			$callback = $this->get_uri('top');
		}
		
		//id is not suplied
		if ($_GET['id'] == "") {
			header('Location: ' . $callback);
			exit(1);
		}
		
		//get instance of twitteroauth
		$connection = new TwitterOAuth(
			$consumer_key, $consumer_secret,
			$token_credentials['oauth_token'],
			$token_credentials['oauth_token_secret']);
		$connection->format = 'xml';
		
		//get response
		$response = $connection->get(
			'statuses/show',
			array('id' => $_GET['id']));
		$xml = simplexml_load_string($response);
		$this->set_assign('status', $xml);
		
		//token
		$post_token = guid();
		$_SESSION['post_token'] = $post_token;
		$this->set_assign('post_token', $post_token);
		
		$this->set_assign('message', $message);
		$this->set_assign('callback', $callback);
		$this->render();
	}
}

?>
