<ul class="nav">
	<?php if ($this->template->nav): ?>
	<?php foreach ($this->template->nav as $navigation_item): ?>
    <li class="active">
    	<a href="<?php echo ($navigation_item['external'] == 0) ? site_url($navigation_item['url']) : $navigation_item['url']; ?>" title="<?php echo $navigation_item['description']; ?>"><b><?php echo $navigation_item['title']; ?></b></a>
    </li>
<?php endforeach; ?>
<?php endif; ?>	

<?php if ( ! $this->ion_auth->logged_in() ): ?>
	<li><a href="<?php echo site_url('auth/login') ?>"><b>Log In</b></a></li>
<?php endif ?>

</ul>
