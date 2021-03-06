<?php

require_once 'twitteroauth.php';
require_once dirname(__FILE__) . '/lists.php';

class Module_info_lists_subscriptions extends Module_info_lists
{
	function get_and_parse($connection, $user, $cursor)
	{
		$this->response = $connection->get(
			'lists/subscriptions',
			array(
				'screen_name' => $user->screen_name,
				'cursor' => $cursor,
			));
		return $this->response->lists;
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
