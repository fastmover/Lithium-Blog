<div class="container">
		<div id="margintopforty">
			<div class="span12">
			<?php foreach($users as $user): ?>
				<div class="row-fluid">
					<div class="span12">
						<article>
							<h1><?=$this->html->link($user->username,'/users/view/'.$user->_id); ?></h1>
							<p><?=$user->username ?></p>
							<? //print_r(get_defined_vars()); ?>
						</article>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
