<div class="row">
	<div class="col-sm-9">
		<h3><?php echo $post['title'] ?></h3>
        <h4>
          <small class="text-muted">
          	<span class="glyphicon glyphicon-time" aria-hidden="true"></span> <?php echo nice_date($post['date_posted'], 'M d Y') ?>
          	<span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $post['display_name'] ?>
            <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> <?php echo $post['comment_count'] ?>
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 
              <?php foreach ($post['categories'] as $cat): ?>
                <?php echo $cat->name ?> 
              <?php endforeach ?> 
          </small>
        </h4>
        <?php echo $post['content'] ?>
        <h4>
          <small class="text-muted">
            
        </small>
        <?php if ( $this->ion_auth->is_admin() || $this->ion_auth->in_group('editor') || $this->ion_auth->logged_in() && $this->ion_auth->get_user_id() == $post->author ): ?>
            <br><a class="btn btn-default text-muted" href="<?php echo site_url('admin/edit_post/' . $post['id']) ?>">Edit</a> 
            <?php endif ?>
      </h4>
	<hr>
      <h4><?php echo lang('comments_title'); ?></h4>

      	<?php if ($post['comment_count'] > 0): ?>

		<?php foreach ($comments as $comment): ?>
		<article class="row">
            <div class="col-sm-10 col-sm-offset-1">
              <div class="panel panel-default arrow left">
                <div class="panel-body">
                  <header class="text-left">
                    <div class="comment-user">
                    	<i class="glyphicon glyphicon-user"></i> 
                    	<a href="#comment-<?php echo $comment->id; ?>"> <?php echo $comment->author; ?>
                    	</a>
                    </div>
                    <time class="comment-date" datetime="<?php echo date("D, d M Y H:i:s T", strtotime($comment->date)) ?>">
                    	<i class="glyphicon glyphicon-time"></i> 
                    	<?php echo nice_date($comment->date, 'M d Y H:i:s T') ?>
                    </time>
                  </header>
                  <div class="comment-post">
                    <p>
                    	<?php echo $comment->content; ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </article>
          <?php endforeach; ?>
		<?php else: ?>
			<p><?php echo lang('no_comments'); ?></p>
		<?php endif; ?>

	</div>


	<div class="col-sm-3">

		<h2><?php echo lang('leave_reply'); ?></h2>
		<?php if ($this->config->item('allow_comments') == '1' && $post['allow_comments'] != '0'): ?>
			
		<?php if (validation_errors()): ?>
		<div class="error">
			<?php echo validation_errors(); ?>
		</div>
		<?php endif; ?>
			
	 	<form class="form-horizontal" method="post" action="">

	 		<?php if ( ! $this->ion_auth->logged_in() ): ?>
		  <div class="form-group">
		      <input name="nickname" id="nickname" type="text" value="<?php echo set_value('nickname'); ?>" class="form-control" placeholder="<?php echo lang('nickname'); ?>" required />
		  </div>
		  <div class="form-group">
		      <input name="email" id="email" type="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="<?php echo lang('email'); ?>" required />
		  </div>

		<?php else: ?>

		<div class="form-group">
		      <input name="nickname" id="nickname" type="text" value="<?php echo $this->ion_auth->get_display_name(); ?>" class="form-control" placeholder="<?php echo lang('nickname'); ?>" required disabled />
		  </div>


		<?php endif ?>
		  

		  <div class="form-group">
		      <textarea name="comment" id="comment" rows="6" cols="46" class="form-control" placeholder="<?php echo lang('comments_title'); ?>" required><?php echo set_value('comment'); ?></textarea>
		  </div>
		  <div>
		  	<p><small><em><?= lang('comment_help_text') ?></em></small></p>
		  </div>

		  <?php if ($this->config->item('use_recaptcha') == 1): ?>
		  <div class="form-group">
			  <script src='https://www.google.com/recaptcha/api.js'></script>
			  <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('recaptcha_site_key') ?>"></div>
		  </div>
			<?php endif ?>

		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <input type="submit" name="submit" class="btn btn-primary" value="<?php echo lang('comment_submit'); ?>" />
		    </div>
		  </div>
		</form>


		<?php else: ?>
			<?php if ($this->config->item('allow_comments') == '0'): ?>
				<p><?php echo lang('comments_disabled'); ?></p>
			<?php else: ?>
				<p><?php echo lang('comments_disabled_post'); ?></p>
			<?php endif ?>
		<?php endif; ?>

	</div>
</div>