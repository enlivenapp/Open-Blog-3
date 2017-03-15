<!DOCTYPE html>
<html lang="<?= $this->session->language_abbr ?>">
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

		<title><?php echo $template['title']; ?></title>
    <!-- if you create CDN links, do that first before echoing $template['metadata'] so you can override default CDN settings -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		
    <!-- add css and js before echoing $template['metadata'] -->
    <?php $this->template->append_css('default.css') ?>

    <!-- echo css, js, and other metadata as defined -->
    <?php echo $template['metadata']; ?>
	</head>
	<body>
		<!-- temp -->



<div class="wrapper">

    <div class="box" style="background-image:url('<?php echo Asset::get_filepath_img('bg_suburb.jpg'); ?>');">
        <div class="row">

          <?php if ( $this->ion_auth->logged_in() ): ?>
          <div class="container-fluid">
          <nav class="navbar navbar-inverse" id="admin-navbar">
            
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Admin</a>
              </div>

              
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="admin-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                  <?php if ($this->template->admin_nav): ?>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <?php foreach ($this->template->admin_nav as $nav): ?>
                      <li><?= $nav ?></li>
                      <?php endforeach ?>
                    </ul>
                  </li>
                <?php endif ?>
                <!-- everyone gets to see this if logged in -->
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?php echo site_url('auth/logout') ?>"><b>Log Out</b></a></li>
                      <li><a href="<?php echo site_url('auth/edit_user/' . $this->ion_auth->get_user_id()) ?>"><b>Edit Profile</b></a></li>
                    </ul>
                  </li>


                </ul>
              </div><!-- /.navbar-collapse -->
            <!-- /.container-fluid -->
          </nav>
          </div>
          <?php endif ?>
            <!-- sidebar -->
            <div class="column col-sm-3" id="sidebar">
                <a class="logo" href="#"><?php echo substr ($template['title'], 0, 1 ) ; ?></a>
                  <?php echo $template['partials']['nav']; ?>
              
            </div>
            <!-- /sidebar -->
          
            <!-- main -->
            <div class="column col-sm-9" id="main">
                <div class="padding">
                    <div class="full col-sm-9">
                      <div class="row">
                        <div class="col-sm-10">
                            <h2><?php echo $template['title']; ?></h2>
                        </div>
                        <?php if ($this->template->lang_picker): ?>
                          <div class="col-sn-2">
                            <div class="btn-group">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Choose Language <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu">
                                <?php foreach ($this->template->lang_picker as $lang): ?>
                                <li><?= $lang ?></li>
                                <?php endforeach ?>
                                
                              </ul>
                            </div>
                          </div>
                        <?php endif ?>
                      </div>
                      

                      
                        <!-- content -->

                        <?php if ($this->session->flashdata()): ?>
                        <div class="flashData">
                              <?php if($this->session->flashdata('success')): ?>
                              <div class="alert alert-success" role="alert">
                                <?php echo $this->session->flashdata('success') ?>
                              </div>
                              <?php endif ?>

                              <?php if($this->session->flashdata('error')): ?>
                              <div class="alert alert-danger" role="alert">
                                <?php echo $this->session->flashdata('error') ?>
                              </div>
                              <?php endif ?>

                              <?php if($this->session->flashdata('info')): ?>
                              <div class="alert alert-info" role="alert">
                                <?php echo $this->session->flashdata('info') ?>
                              </div>
                              <?php endif ?>

                              <?php if($this->session->flashdata('warning')): ?>
                              <div class="alert alert-warning" role="alert">
                                <?php echo $this->session->flashdata('warning') ?>
                              </div>
                              <?php endif ?>


                            </div>
                            <?php endif ?>
      
                        <?php echo $template['body']; ?>

                            <?php echo $template['partials']['social']; ?>
                            

                      <div class="col-sm-12">
                          <div class="page-header text-muted divider" id="blog-links">
                            <?php echo lang('blog_links_hdr'); ?>
                          </div>
                        </div>

                          
                        <div class="row">

                          <div class="col-sm-3">
                            <?php echo $template['partials']['links']; ?>
                          </div>


                          <div class="col-sm-3">
                            <?php echo $template['partials']['archives']; ?>
                          </div>


                          <div class="col-sm-3">
                            <?php echo $template['partials']['categories']; ?>
                          </div>

                          <div class="col-sm-3">
                            <?php echo $template['partials']['notices']; ?>
                          </div>

                        </div>
                        
                        <hr>

                        <div class="row" id="footer">    
                          <div class="col-sm-6">
                            <p class="">
                            <a href="http://www.bootply.com">Theme: Bootply</a> | <a href="http://open-blog.org">Powered by Open Blog</a>
                            </p>
                          </div>
                          <div class="col-sm-6 text-right">
                            <p>
                              <a href="#">© Copyright <?php echo date('Y') ?> <?php echo $template['title']; ?></a>
                            </p>
                          </div>
                        </div>
                    </div><!-- /col-9 -->
                </div><!-- /padding -->
            </div>
            <!-- /main -->

        </div>
    </div>
</div>

<!-- temp -->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>



