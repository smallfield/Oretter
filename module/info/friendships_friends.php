<?php

require_once 'twitteroauth.php';
require_once dirname(__FILE__) . '/friendships.php';

class Module_info_friendships_friends extends Module_info_friendships
{
	function get_and_parse($connection, $user, $cursor)
	{
		$this->response = $connection->get(
			'friends/list',
			array(
				'screen_name' => $user->screen_name,
				'cursor' => $cursor,
			)
		);
		return $this->response->users;
	}
	function get_next_cursor()
	{
		return $this->response->next_cursor_str;
	}
	function get_prev_cursor()
	{
		return $this->response->prev_cursor_str;
	}
}

?>
