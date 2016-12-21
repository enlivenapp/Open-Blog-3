
<div class="col-sm-12" id="recent">   
  <div class="page-header text-muted">
    <?php if (! $this->uri->segment(1)): ?>
  Recent Posts
<?php else: ?>
  Older Posts
<?php endif ?>
  </div> 
</div>


<?php foreach ($posts as $post): ?>

	<div class="row">    
      <div class="col-sm-10">
        <h3><?php echo $post->title ?></h3>
        <h4>
          <small class="text-muted">
          	<span class="glyphicon glyphicon-time" aria-hidden="true"></span> <?php echo nice_date($post->date_posted, 'M d Y') ?>
          	<span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $post->display_name ?>
          	<span class="glyphicon glyphicon-comment" aria-hidden="true"></span> <?php echo $post->comment_count ?>
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
            <?php foreach ($post->categories as $cat): ?>
                <?php echo $cat->name ?> 
              <?php endforeach ?>               
          </small>
        </h4>
        <p><?php echo $post->excerpt ?></p>
        <h4>
          <small class="text-muted">
            <a class="btn btn-default text-muted" href="<?php echo $post->url ?>">Read More</a> 
            <?php if ( $this->ion_auth->is_admin() || $this->ion_auth->in_group('editor') || $this->ion_auth->logged_in() && $this->session->userdata('user_id') == $post->author  ): ?>
            <a class="btn btn-default text-muted" href="<?php echo site_url('blog/edit_post/' . $post->id) ?>">Edit</a> 
            <?php endif ?>
            <br>
            
        </small>
      </h4>
      </div>

      <div class="col-sm-2">
        <a href="#" class="pull-right"><img src="/assets/example/bg_sailboat.jpg" class="img-circle"></a>
      </div> 

    </div>


<div class="row divider">    
    <div class="col-sm-12">
        <hr>
    </div>
</div>

<?php endforeach ?>

<?php if ($pagination): ?>
<div class="row divider">    
    <div class="col-sm-12">
        <?php echo $pagination ?>
    </div>
</div>
<?php endif ?>