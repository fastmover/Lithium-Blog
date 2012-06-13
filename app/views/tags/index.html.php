<div class="container">
	<div id="margintopforty">
		<div class="span12">
			<div class="row-fluid">
				<div class="span12">
					<ul>
						<?php foreach($tags as $tag): ?>
							<li>
								<?=$this->html->link($tag,'/tags/'.$tag); ?>
							</li>						
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
