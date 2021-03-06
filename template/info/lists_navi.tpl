<?php
	$user = $this->get_assign('user');
	$lists_params = array(
		'screen_name' => (string)$user->screen_name,
	);
?>
<h2 id="list"><?= escape($user->screen_name) ?>のリスト</h2>
<ul>
	<li><a href="<?= escape($this->get_uri('info/lists', $lists_params)) ?>">
		作成したリスト・購読しているリスト
	</a></li>
	<li><a href="<?= escape($this->get_uri('info/lists_ownerships', $lists_params)) ?>">
		作成したリスト
	</a></li>
	<li><a href="<?= escape($this->get_uri('info/lists_subscriptions', $lists_params)) ?>">
		購読しているリスト
	</a></li>
	<li><a href="<?= escape($this->get_uri('info/lists_memberships', $lists_params)) ?>">
		登録されているリスト
	</a></li>
</ul>
