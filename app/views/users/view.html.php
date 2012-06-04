<div class="container">
	<div id="margintopforty">
		<div class="span12">
			<div class="row-fluid">
				<div class="span12">
					<article>
						<h3><?=$user->_id; ?></h3>
						<h1><?=$this->html->link($user->username,'/users/edit/'.$user->_id); ?></h1>
						<h3><?=$user->password; ?></h3>
						<p><?=$user->access_level ?></p>
						<p><?=$user->email ?></p>
					</article>
				</div>
			</div>
		</div>
	</div>
</div>
