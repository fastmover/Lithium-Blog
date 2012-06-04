<div class="container">
		<div id="margintopforty">
			<div class="span12">
			<?php foreach($posts as $post): ?>
				<div class="row-fluid">
					<div class="span12">
						<article>
							<h1><?=$this->html->link($post->title,'/posts/view/'.$post->_id); ?></h1>
							<p><?=$post->body ?></p>
							<? //print_r(get_defined_vars()); ?>
							<ul>
								<?php foreach($post->meta->keywords as $keyword): ?>
								<li>
									<?=$keyword; ?>
								</li>
								<?php endforeach; ?>
							</ul>
						</article>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
