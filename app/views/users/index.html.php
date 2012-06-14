<div class="container">
		<div id="margintopforty">
			<div class="span12">
			<?php foreach($users as $user): ?>
				<div class="row-fluid">
					<div class="span12">
						<article>
							<h1><?=$this->html->link($user->username,'/users/view/'.$user->_id); ?></h1>
							<div class="marginLeft1">
								<p>Username: <?=$user->username ?></p>
								<p>Access Level: <?=$user->access_level ?></p>
								<p>E-mail: <?=$user->email ?></p>
								<? //print_r(get_defined_vars()); ?>
							</div>
						</article>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
