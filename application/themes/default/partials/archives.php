<h4 class="text-center text-muted"><?php echo lang('archives_hdr'); ?></h4>

<ul class="list-group">
	<?php if ($this->template->archives_list): ?>
		<?php foreach ($this->template->archives_list as $archive_item): ?>
			<li class="list-group-item text-center"><a href="<?php echo archive_url($archive_item['url']); ?>"><?php echo $archive_item['date_posted']; ?> (<?php echo $archive_item['posts_count']; ?>)</a></li>
		<?php endforeach; ?>
	<?php endif; ?>
</ul>
