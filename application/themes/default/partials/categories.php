<h4 class="text-center text-muted"><?php echo lang('categories_hdr'); ?></h4>
<ul class="list-group">
	<?php if ($this->template->categories_list): ?>
		<?php foreach ($this->template->categories_list as $category): ?>
			<li class="list-group-item text-center"><a href="<?php echo category_url($category['url_name']); ?>"> <?php echo $category['name']; ?> (<?php echo $category['posts_count']; ?>)</a></li>
		<?php endforeach; ?>
	<?php endif; ?>
</ul>