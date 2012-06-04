<?php foreach($posts As $post): ?>
<item>
	<title><?= $post->title; ?></title>
	<description><?= $post->body; ?></description>
	<link><?= $this->url("/posts/" . $post->_id); ?></link>
	<guid isPermaLink="true"><?=$this->url("/posts/" . $post->_id); ?></guid>
	<pubDate><?php  /*date('D, d M Y g:i:s O', $post->created->sec); */ ?></pubDate>
</item>
<?php endforeach; ?>