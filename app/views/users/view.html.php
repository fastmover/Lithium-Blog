<div class="container">
	<div id="margintopforty">
		<div class="span12">
			<div class="row-fluid">
				<div class="span12">
					<article>
						<h2><?=$user->username; ?></h2>
						<h5><?=$this->html->link('Edit ' . $user->username,'/users/edit/'.$user->_id); ?></h5>
                                                <div class="marginLeft1">
                                                    <p>Access Level: <?=$user->access_level ?></p>
                                                    <p>E-Mail: <?=$user->email ?></p>
                                                </div>
					</article>
				</div>
			</div>
		</div>
	</div>
</div>
