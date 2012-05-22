<div class="container">
		<div id="margintopforty">
			<div class="span12">
			<?php foreach($posts as $post): ?>
				<div class="row-fluid">
					<div class="span12">
						<article>
							<h1><?=$post->title ?></h1>
							<p><?=$post->body ?></p>
						</article>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
