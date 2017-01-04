<div class="col-sm-12" id="recent">   
  <div class="page-header text-muted">
  	<?= $page['title'] ?>
  </div> 
</div>


	<div class="row">    
      <div class="col-sm-12">
        <h4>
          <small class="text-muted">
          	<span class="glyphicon glyphicon-time" aria-hidden="true"></span> <?php echo nice_date($page['date'], 'M d Y') ?>
          </small>
        </h4>
        <p><?php echo $page['content'] ?></p>
        <h4>
          <small class="text-muted">
            <?php if ( $this->ion_auth->is_admin() || $this->ion_auth->in_group('editor') || $this->ion_auth->logged_in() && $this->session->userdata('user_id') == $post->author  ): ?>
            <a class="btn btn-default text-muted" href="<?php echo site_url('pages/edit_page/' . $page['id']) ?>"><?php echo lang('btn_edit'); ?></a> 
            <?php endif ?>
            <br>
            
        </small>
      </h4>
      </div>

    </div>