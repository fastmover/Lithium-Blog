<div class="container">
		<div id="margintopforty">
			<div class="span12">
			<?php //foreach($posts as $post): ?>
				<div class="row-fluid">
					<div class="span12">
						<article>
							<h1><?=$post['title'] ?></h1>
							<? //print_r(get_defined_vars()); ?>
							<p><?=$post['body'] ?></p>
							<ul><?=$this->Tags->tags( $post['tags'] ); ?></ul>
							<br />
							<h2>Meta</h2>
							<p><?=$post['meta.title'] ?></p>
							<p><?=$post['meta.description'] ?></p>
							<ul><?=$this->Tags->keywords( $post['meta.keywords'] ); ?></ul>
						</article>
					</div>
				</div>
			<?php //endforeach; ?>
		</div>
	</div>
</div>
