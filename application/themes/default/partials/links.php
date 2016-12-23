<h4 class="text-center text-muted"><?php echo lang('links_hdr'); ?></h4>
<?php if ($this->template->links_list): ?>
<ul class="list-group">
		<?php foreach ($this->template->links_list as $link): ?>
			<li class="list-group-item text-center"><a href="<?php echo $link['url']; ?>" title="<?php echo $link['description']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['name']; ?></a></li>
		<?php endforeach; ?>
</ul>
<?php endif; ?>